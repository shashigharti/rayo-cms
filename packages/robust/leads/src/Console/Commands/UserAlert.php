<?php
namespace Robust\Leads\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Robust\Leads\Models\UserSearch;
use Robust\Leads\Repositories\Admin\UserSearchRepository;
use Robust\Mls\Models\Listing;
use Robust\Mls\Models\ListingFilters;
use Illuminate\Database\Eloquent\Collection;

class UserAlert extends Command
{
    protected $signature = 'send:user-alerts';
    protected $description = 'Sends user Alerts';
    protected $logFile ;
    protected $userSearch;


    public function __construct(UserSearchRepository $userSearch)
    {
        $this->userSearch = $userSearch;
        $this->logFile = 'mail_log_' .date('d_m_y');
        Storage::put($this->logFile,date('d_m_y').PHP_EOL) ;
    }

    public function handle()
    {
        //get User with Search Criteria
        $searches = $this->model->with(['user' => function($query){
            $query->where('user_type','!=','discarded');
        }])->whereHas('user')
            ->where('reference_time','<=',date('Y-m-d H:i:s'))
            ->get();

        $users = $searches->filter(function($value,$key){
            if (date('l') == $value->frequency) {
                return true;
            } elseif ($value->frequency == 'Daily') {
                return true;
            } elseif ($value->frequency == 'Biweekly' && strtotime($value->reference_time) <= (strtotime('now') - (14 * 24 * 60 * 60))) {
                return true;
            } elseif ($value->frequency == 'Monthly' && strtotime($value->reference_time) <= (strtotime('now') - (30 * 24 * 60 * 60))) {
                return true;
            }
            return false;
        });
        $bar = $this->output->createProgressBar(count($users));
        $chunkedUsers = $users->chunk(10);
        foreach ($chunkedUsers as $chunkedUser)
        {
            foreach ($chunkedUser as $user)
            {
                $user_searches = (array)$user->content;
                $results = [];
                if(!empty($user_searches)){
                    try {
                        $results = $this->runSearch($user_searches,$user);
                    }catch (\Exception $ex){
                        Log::info('User Alert : ' . $ex->getTraceAsString());
                    }
                }else{
                    continue;
                }
                if(!empty($results['results'])){
                    $sample = $results['results'];
                }else{
                    continue;
                }
                if(count($sample) > 0 && !empty($user->user) && empty($user->user->unsubscribe)
                && $this->isValidEmail($user)){
                    $this->sendEmail($user,$sample,$results['counts']);
                    $bar->advance();
                }else{
                    continue;
                }
            }
        }
    }
    public function isValidEmail($userAlert)
    {
        return (bool)( !empty($userAlert->user->email) && filter_var($userAlert->user->email, FILTER_VALIDATE_EMAIL)) ? true : false;
    }
    public function runSearch($searches,$user)
    {
        $request = new \Illuminate\Http\Request();
        $request->merge($searches);
        $builder = Listing::query();
        try {
            $filters = new ListingFilters($request);
            $base_queries = $filters->apply($builder)
                ->where('system_price', '>=', 50000)
                ->where('picture_count', '>', 0)
                ->where('input_date', '>=', $user->reference_time)
                ->where('status', 'Active')
                ->with('firstImage');
            $total_count = (clone($base_queries))
                ->count();
            $active_count = (clone($base_queries))
                ->where('status', '=', 'Active')
                ->count();
            $sold_count = (clone($base_queries))
                ->where('status', '=', Client::get()->getClosedStatus())
                ->count();
            $results = (clone($base_queries))
                ->limit(5)
                ->get();
            return [
                'counts' => [
                    'active_count' => $active_count,
                    'sold_count' => $sold_count,
                    'total_count' => $total_count,
                ],
                'results' => $results,
            ];
        } catch (\Exception $e) {
            Storage::append($this->logFile, "Exception in run, for search : " . $user->id . PHP_EOL . $e->getTraceAsString());
            return new \Illuminate\Database\Eloquent\Collection;
        }
    }

    public function sendEmail(UserSearch $user,Collection $sample,$counts)
    {
        $lead = $user->user;
        try {
            Mail::queue(new \App\Mail\UserAlert($user, $sample, $lead, $counts));
            $user->update([
                'reference_time' => date('Y-m-d H:i:s')
            ]);
        }catch (\Exception $e) {
            throw new \EmailException($e, "User Search Email Alert Error");
        }
    }
}
