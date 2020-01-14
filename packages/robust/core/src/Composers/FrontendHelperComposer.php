<?php namespace Robust\Core\Composers;

use Illuminate\Contracts\View\View;
use Robust\RealEstate\Helpers\BannerHelper;
use Robust\RealEstate\Helpers\ListingHelper;
use Robust\RealEstate\Helpers\LocationHelper;
use Robust\RealEstate\Helpers\AdvanceSearchHelper;
use Robust\Core\Helpers\SettingsHelper;

/**
 * Class FrontendHelperComposer
 * @package App\Http\ViewComposers
 */
class FrontendHelperComposer {

    /**
     * ProfileComposer constructor.
     * @param BannerHelper $banner_helper
     * @param ListingHelper $listing_helper
     * @param SettingsHelper $setting_helper
     * @param LocationHelper $location_helper
     * @param AdvanceSearchHelper $advancesearch_helper
     */
    public function __construct(
        BannerHelper $banner_helper,
        ListingHelper $listing_helper,
        SettingsHelper $setting_helper,
        LocationHelper $location_helper,
        AdvanceSearchHelper $advancesearch_helper
    )
    {
        $this->banner_helper = $banner_helper;
        $this->listing_helper = $listing_helper;
        $this->setting_helper = $setting_helper;
        $this->location_helper = $location_helper;
        $this->advancesearch_helper = $advancesearch_helper;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $query_params = request()->all();
        $page = seo(request()->segments());

        $view->with('banner_helper', $this->banner_helper);
        $view->with('listing_helper', $this->listing_helper);
        $view->with('setting_helper', $this->setting_helper);
        $view->with('location_helper', $this->location_helper);
        $view->with('advancesearch_helper', $this->advancesearch_helper);
        $view->with('query_params', $query_params);
        $view->with('page', $page);
    }

}
