<?php

namespace Robust\Pages\Console\Commands;

use App\Listing;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Robust\Pages\Models\Category;
use Robust\Pages\Models\Page;
use Robust\Pages\Repositories\Admin\PageRepository;


/**
 * Class CreatePages
 * @package Robust\Pages\Console\Commands
 */
class CreatePages extends Command
{

    protected $signature = 'create:pages';



    protected $description = 'Creates Pages';


    public function __construct()
    {
        parent::__construct();
    }


    /**
     *
     */
    public function handle()
    {
        //check for category
        $category_id = Category::updateOrCreate(['slug'=>'root'],[
           'name' => 'Root',
           'slug' => 'root',
           'description' => 'Root Pages'
        ])->id;
        //root pages
        $root = [
            [
                'name' => 'Homes for Sale',
                'category_id' => $category_id,
            ],
            [
                'name' => 'Home',
                'category_id' => $category_id,
            ],
            [
                'name' => 'Sold Homes',
                'category_id' => $category_id,
            ],

        ];
        foreach ($root as $page){
            $page['slug'] = Str::slug($page['name']);
            Page::updateOrCreate(['slug'=>$page['slug']],$page);
        }
        //create pages by cities status
        $listings = Listing::select('city')->whereNotNull('city')->groupBy('city')->get();
        $conditions = Listing::select('status')->whereNotNull('status')->groupBy('status')->get();
        $category_id = Category::updateOrCreate(['slug'=>'city'],[
            'name' => 'City',
            'slug' => 'city',
            'description' => 'City Pages'
        ])->id;
        foreach ($conditions as $condition)
        {
            foreach ($listings as $listing)
            {
                $data = [
                  'name' => $listing->city,
                  'slug' => Str::slug($listing->city),
                  'category_id' => $category_id,
                   'meta_title' => 'Homes for sale in ' . $listing->city,
                   'meta_description' => 'Homes for sale in ' . $listing->city,
                   'meta_keywords' => 'Homes,Sale,Rent,' . $listing->city,
                ];
                Page::updateOrCreate(['slug'=>$data['slug']],$data);
                $data = [
                    'name' => $listing->city . ' ' . $condition->status,
                    'slug' => Str::slug($listing->city .' ' . $condition->status),
                    'category_id' => $category_id,
                    'meta_title' => $condition->status. ' Homes in ' . $listing->city,
                    'meta_description' => $condition->status. ' Homes in ' . $listing->city,
                    'meta_keywords' =>$condition->status.',Homes,'  .$listing->city,
                ];
                Page::updateOrCreate(['slug'=>$data['slug']],$data);
                $this->info('City : ' . $listing->city .' || Status : '. $condition->status);
            }
        }
    }
}
