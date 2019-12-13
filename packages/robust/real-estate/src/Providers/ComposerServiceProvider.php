<?php namespace Robust\RealEstate\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'real-estate::website.listings.*',
            'real-estate::website.home'
        ], 'Robust\RealEstate\Composers\FrontendHelperComposer');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

}
