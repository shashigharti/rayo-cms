<?php

namespace Robust\Core\Controllers\Website;

use Robust\Core\Helpage\Site;

/**
 * Class HomeController
 * @package Robust\Core\Controllers\Website
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $templates = config('rws.templates');
        $view = 'core::website.home';
        
        if(isset($templates['home'])){
            $view = $templates['home'];
        }

        return view(Site::templateResolver($view), [
            'page' => 'home'
        ]);
    }

}
