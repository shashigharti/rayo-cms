<?php

namespace Robust\Pages\Controllers\Website\Ajax;

use App\Http\Controllers\Controller;
use Robust\Pages\Repositories\Admin\PageRepository;


/**
 * Class PageController
 * @package Robust\Pages\Controllers\Website
 */
class PageController extends Controller
{
    /**
     * PageController constructor.
     * @param PageRepository $page
     */
    public function __construct(PageRepository $page)
    {
        $this->page = $page;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getPage($slug)
    {
        $page = $this->page->where('slug', $slug)->first();
        return $page;
    }
}
