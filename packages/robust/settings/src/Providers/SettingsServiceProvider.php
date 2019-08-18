<?php
namespace Robust\Settings\Providers;

use Illuminate\Support\ServiceProvider;
use Robust\Settings\Events\PageSetupEventSubscriber;
use Webwizo\Shortcodes\Facades\Shortcode;

/**
 * Class PagesServiceProvider
 * @package Robust\Pages\Providers
 */
class SettingsServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function register()
    {
        $this->register_includes();
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'pages');
        $this->registerModelEvents();
//        $this->registerShortCodes();
    }

    /**
     *
     */
    public function register_includes()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/permissions.php', 'pages.permissions');
    }

    /**
     *
     */
    public function registerModelEvents()
    {
        $this->app->events->subscribe(new PageSetupEventSubscriber());
    }

    /**
     *
     */
    public function registerShortCodes()
    {
        Shortcode::register('page', 'Robust\Pages\Helpers\PageHelper@shortcode');
    }
}
