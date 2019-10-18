<?php

namespace Robust\Pages\Console\Commands;

use Illuminate\Console\Command;
use Robust\Pages\Models\Page;
use Spatie\Sitemap\Sitemap;


/**
 * Class CreateSiteMap
 * @package Robust\Pages\Console\Commands
 */
class CreateSiteMap extends Command
{

    /**
     * @var string
     */
    protected $signature = 'create:site-map';


    /**
     * @var string
     */
    protected $description = 'Creates Site-map xml';


    /**
     * CreateSiteMap constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     *
     */
    public function handle()
    {
        //remove previous file if exist
        $file = public_path() . '/site-map.xml';
        if(file_exists($file)){
            unlink($file);
        }
        $sitemap = Sitemap::create();
        $pages = Page::get();
        foreach ($pages as $page){
            $url = env('APP_URL') .'/' .$page->slug ;
            if (substr($page->slug, 0, 1) === '/'){
                $url = env('APP_URL').$page->slug;
            }
            $sitemap->add(Url::create($url)
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(1.0));
        }
        $sitemap->writeToFile($file);
    }
}