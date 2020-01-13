<?php
namespace Robust\RealEstate\Helpers;

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
     * @param $slug
     * @return mixed
     */
    public function getPageBySlug($slug){
        $page = $this->pages->where('slug', $slug)->first();
        return $page;
    }

}