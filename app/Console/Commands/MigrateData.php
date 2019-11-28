<?php

namespace App\Console\Commands;

use App\Helpers\DateTimeHelper;
use App\ListingFilters;
use App\Mail\UserAlert as UserAlertEmailService;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Robust\RealEstate\Models\UserSearch;
use Robust\RealEstate\Models\Listing;

/**
 * Class UserAlert
 * @package App\Console\Commands
 */
class MigrateData extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'send:migrate-listing-details';
    /**
     * The console command description.
     * @var string
     */
    protected $description = "Migrate Old Tables to New Structure; This command will be removed";


    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $listings = Listing::all();
        foreach($listings as $listing){
            
        }
    }
}
