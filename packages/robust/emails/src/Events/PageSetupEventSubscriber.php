<?php

namespace Robust\Emails\Events;

use Robust\Pages\Models\Category;
use Robust\Pages\Models\Page;

/**
 * Class PageSetupEventSubscriber
 * @package Robust\Pages\Events
 */
class PageSetupEventSubscriber
{
    /**
     * @param $menu
     */
    public function onWebsiteMenu($menu)
    {
        $links = with(new Page)->all();
        $title = 'Page';
        $slugprefix = 'page';
        $type = 'Page';
        $model = 'Robust\Pages\Models\Page';
        $menu->put('page', \View::make(
            'menus::admin.partials.links',
            compact('links', 'title', 'type', 'model', 'slugprefix')
        ));

        $links = with(new Category)->all();
        $title = 'Page Category';
        $slugprefix = 'category';
        $type = 'Page_category';
        $model = 'Robust\Pages\Models\Category';
        $menu->put('page_category', \View::make(
            'menus::admin.partials.links',
            compact('links', 'title', 'type', 'model', 'slugprefix')
        ));
    }

    /**
     * @param $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'website.menu.build',
            'Robust\Pages\Events\PageSetupEventSubscriber@onWebsiteMenu'
        );
    }
}
