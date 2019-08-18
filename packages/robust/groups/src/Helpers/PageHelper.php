<?php
namespace Robust\Pages\Helpers;

use Robust\Pages\Models\Category;
use Robust\Pages\Models\Page;


/**
 * Class PageHelper
 * @package Robust\Pages\Helpers
 */
class PageHelper
{

    /**
     * @param $slug
     * @return mixed
     */
    public function getPages($slug)
    {
        $page = Page::where('slug', $slug)->enabled()->first();
        return $page;
    }

    /**
     * @param $slug
     * @return null
     */
    public function getPagesByCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if ($category) {
            return $category->pages()->enabled()->get();
        }
        return null;
    }

    /**
     * @param $attr
     * @param null $content
     * @param null $name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function shortcode($attr, $content = null, $name = null)
    {
        $page = Page::where('slug', $content)->first();
        $page_to_view = view('pages::website.pages.shortcode', compact('page'));
        return $page_to_view;
    }
}