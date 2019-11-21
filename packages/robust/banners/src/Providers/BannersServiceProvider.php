<?php
namespace Robust\Banners\Providers;

use Illuminate\Support\ServiceProvider;
use Robust\Banners\Repositories\BannerRepository;
use Robust\Banners\Models\Banner;
use Robust\Banners\Helpers\BannerHelper;

/**
 * Class BannersServiceProvider
 * @package Robust\Banners\Providers
 */
class BannersServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->register_includes();
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'banners');

        $this->app->bind(BannerHelper::class, function ($app) {
            return new BannerHelper($app->make('Robust\Banners\Repositories\BannerRepository'));
        });
    }
   
    public function register_includes()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/permissions.php', 'banners.permissions');
        foreach (new \DirectoryIterator(__DIR__ . '/../../routes/admin/') as $fileInfo) {
            if (!$fileInfo->isDot()) {
                include __DIR__ . '/../../routes/admin/' . $fileInfo->getFilename();
            }
        }
    }
}
