<?php

namespace Robust\Pages\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Robust\Core\Helpage\Breadcrumb;
use Robust\Core\Helpage\Site;
use Robust\Pages\Models\Category;
use Robust\Pages\Models\Page;
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
     * @return $this
     */
    public function getPage($slug)
    {
        Lang::setLocale(\Session::get('locale'));
        $page = Page::where('slug', $slug)->firstOrFail();
        Breadcrumb::getInstance()->setName('robust.pages', $page->name);
        return view(Site::templateResolver('pages::website.index'))->with(['page' => $page, 'model' => $page]);
    }

    /**
     * @param $slug
     * @return $this
     */
    public function getCategory($slug)
    {
        Lang::setLocale(\Session::get('locale'));
        $category = Category::where('slug', $slug)->first();
        return view(Site::templateResolver('pages::website.index'))->with('category', $category);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function searchContent(Request $request)
    {
        $data = $request->all();
        $search_contents = $this->page->searchContent($data);
        return view(Site::templateResolver('pages::website.index'))->with('search', true)->with('search_data',
            $search_contents)->with('search_text', $data['keyword']);

    }
}
