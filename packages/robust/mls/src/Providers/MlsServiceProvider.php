<?php
namespace Robust\Mls\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class MlsServiceProvider
 */
class MlsServiceProvider extends  ServiceProvider
{

    /**
     *
     */
    public function register()
    {
        $this->register_includes();
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'mls');
    }


    /**
     *
     */
    public function register_includes()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/permissions.php', 'mls.permissions');
        $this->mergeConfigFrom(__DIR__ . '/../../config/listings.php', 'mls.listings');
        $this->mergeConfigFrom(__DIR__ . '/../../config/albo.php', 'mls.albo');
        $this->mergeConfigFrom(__DIR__ . '/../../config/columns.php', 'mls.columns');
        $this->mergeConfigFrom(__DIR__ . '/../../config/query_filter.php', 'mls.query');
        $this->mergeConfigFrom(__DIR__ . '/../../config/tampa.php', 'mls.tampa');
        $this->mergeConfigFrom(__DIR__ . '/../../config/santa.php', 'mls.santa');
        $this->mergeConfigFrom(__DIR__ . '/../../config/iowa.php', 'mls.iowa');
        $this->mergeConfigFrom(__DIR__ . '/../../config/panama.php', 'mls.panama');
    }
}