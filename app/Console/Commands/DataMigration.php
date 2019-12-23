<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DataMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rws:migrate-data';

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
      'automated_emails' => 'real_estate_automated_emails'
    ];

    public function handle()
    {
        foreach ($this->mapping as $key => $map)
        {
            DB::table($map)->truncate();
            $records = DB::connection('mysql2')->table($key)->get();
            foreach ($records as $record){
                DB::table($map)->insert(get_object_vars($record));
            }
        }
    }
}
