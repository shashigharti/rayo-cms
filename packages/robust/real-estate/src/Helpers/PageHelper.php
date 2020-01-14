<?php
namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Models\Page;
use Robust\RealEstate\Repositories\Admin\PageRepository;


/**
 * Class PageHelper
 * @package Robust\RealEstate\Helpers
 */
class PageHelper
{

    /**
     * @var PageRepository
     */
    private $pages;

    /**
     * PageHelper constructor.
     * @param PageRepository $page
     */
    public function __construct(PageRepository $page)
    {
        $this->pages = $page;
    }

    /**
     * @param $page_type
     * @return mixed
     */
    public function getLinksByType($page_type){
        $page = Page::where('page_type', $page_type)->get();
        return $page;
    }

}