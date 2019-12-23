<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Robust\Admin\Models\User;
use Robust\RealEstate\Models\Agent;

class LeadDataMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rws:migrate-leads';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Old lead data to new';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    protected $mapping = [
        'firstname' =>'first_name',
        'lastname' =>'last_name',
        'phone_number' => 'phone_number',
        'open_password' => 'open_password',
        'agent_id' => 'agent_id',
        'deal_type' => 'deal_type',
        'last_active' =>'last_active',
        'activation_status' => 'activation_status',
        'status_id' => 'status_id',
        'ip' => 'ip',
        'agent_partner_assigned' => 'agent_partner_assigned',
    ];

    protected $class = '\Robust\RealEstate\Models\Lead';

    protected $table = 'real_estate_locations';

    protected $relations = [
        'metadata' => [
            'old' => 'lead_metadatas',
            'new' => 'real_estate_lead_metadatas',
        ],
        'followups' => [
            'old' => 'lead_followup',
            'new' => 'real_estate_lead_followups',
        ],
        'ratings' => [
            'old' => 'lead_ratings',
            'new' => 'real_estate_leads_ratings',
        ],
        'calls' => [
            'old' => 'calls',
            'new' => 'real_estate_lead_calls',
        ],
        'bookmark' => [
            'old' => 'lead_bookmark',
            'new' => 'real_estate_lead_bookmarks'
        ],
        'email replies' => [
            'old' => 'email_replies',
            'new' => 'real_estate_lead_email_replies'
        ],
        'sent_emails' => [
            'old' => 'sent_emails',
            'new' => 'real_estate_sent_emails'
        ],
        'distance' => [
            'old' => 'lead_distance_drive',
            'new' => 'real_estate_lead_distance_drive'
        ]
    ];

    public function handle()
    {
        $total = DB::connection('mysql2')->table('leads')->count();
        $processed = 0;
        $user_count = 0;
        DB::connection('mysql2')->table('leads')->chunkById(1000,function ($leads) use ($total,$processed,$user_count){
            foreach ($leads as $lead){
                $lead_array = (array) $lead;
                $properties = [];
                $result = [];
                foreach ($lead_array as $key =>  $data)
                {
                    if(isset($this->mapping[$key])){
                        $result[$this->mapping[$key]] = $data;
                    }else{
                        if(!is_null($data) && !in_array($data,['','None','none','Undefined'])){
                            $property = [
                                'type' => $key,
                                'value' => $data
                            ];
                            array_push($properties,$property);
                        }
                    }
                }

                $agent_id = $lead->agent_id;
                $user = null;
                if($agent_id){
                    $old = DB::connection('mysql2')->table('users')->where('id',$agent_id)->first();
                    if($old){
                        $agent = Agent::updateOrCreate(['first_name' => $old->firstname,'last_name' => $old->lastname],[
                            'first_name' => $old->firstname,
                            'last_name' => $old->lastname,
                            'contact' => $old->phone_number,
                        ]);
                        $user = User::updateOrCreate([
                           'member_id' => $agent->id,
                            'member_type' => '\Robust\RealEstate\Models\Agent'
                        ],[
                            'member_id' => $agent->id,
                            'member_type' => '\Robust\RealEstate\Models\Agent',
                            'email' => $old->email,
                            'password' => $old->password,
                            'user_name' => $old->username
                        ]);
                    }

                }
                $result['agent_id'] = $user ? $user->id : null;

                $id = DB::table('real_estate_leads')->insertGetId($result);
                $properties_array = [];
                foreach ($properties as $property)
                {
                    $property['lead_id'] = $id;
                    array_push($properties_array,$property);
                }
                //insert properties
                DB::table('real_estate_leads_properties')->insert($properties_array);
                if(
                    $lead->email != '' &&
                    $lead->email != null &&
                    $lead->open_password != '' &&
                    $lead->open_password != null){
                    DB::table('users')->insert([
                        'member_id' => $id,
                        'member_type' => $this->class,
                        'email' => $lead->email,
                        'password' => Hash::make($lead->open_password),
                        'user_name' => $lead->username,
                    ]);
                    $user_count+=1;
                }


                foreach ($this->relations as $key => $relation)
                {
                    $records_array = [];
                    $records = DB::connection('mysql2')
                        ->table($relation['old'])
                        ->where('lead_id',$lead->id)
                        ->get();
                    foreach ($records as $record){
                        $record = (array) $record;
                        $record['lead_id'] = $id;
                        unset($record['id']);
                        if($key == 'sent_emails'){
                            $record['agent_id'] = $user ? $user->id : null;
                        }
                        array_push($records_array,$record);
                    }
                    DB::table($relation['new'])->insert($records_array);
                    $this->info('Relation : ' . $key);
                }


                $processed+=1;
                $this->info('Total : ' . $total . ' || Processed : ' .$processed . ' || User Count : ' .$user_count);
            }
        });
    }
}
