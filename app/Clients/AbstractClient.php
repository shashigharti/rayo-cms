<?php

namespace App\Clients;

use App\Listings;
use DB;

/**
 * Class AbstractClient
 * @package App\Clients
 */
abstract class AbstractClient
{
    /**
     * @var array
     */
    protected $filtersmap = [];

    /**
     * @var array
     */
    protected $optionsForFindSubdivisions = [];

    /**
     * @return mixed
     */
    public static abstract function getName();

    /**
     * @return mixed
     */
    public static abstract function getEndOfSlug();

    /**
     * @return mixed
     */
    public static abstract function getEndOfActiveSlug();

    /**
     * @param bool $capitalized
     * @return mixed
     */
    public static abstract function getStateShortName($capitalized = true);

    /**
     * @return mixed
     */
    public static abstract function getPropertyClasses();

    /**
     * @return mixed
     */
    public static abstract function getPropertyClassesMap();

    /**
     * @return mixed
     */
    public static abstract function getClosedStatus();

    /**
     * @return mixed
     */
    public static abstract function getSatisfyingCount();

    /**
     * @return mixed
     */
    public static abstract function getNameEnv();

    /**
     * @return string
     */
    public static abstract function getNameOrStateShortName(): string;

    /**
     * @return mixed
     */
    public static abstract function getNoticeDistributionList();


    // For craete page artisan command

    /**
     * @return mixed
     */
    public static abstract function getCustomReportTypes();

    /**
     * @param $page_type
     * @return mixed
     */
    public static abstract function isKeyExistInCustomReportTypes($page_type);

    /**
     * @param $page_type
     * @param $model
     * @return mixed
     */
    public static abstract function getCustomPages($page_type, $model);


    /**
     * @return string
     */
    public static function getMinimumPrice()
    {
        return '50000';
    }

    /**
     * @param $data_map
     * @return string
     */
    public static function getLeadImportMailTemplate($data_map)
    {
        return "The bar has been raised on the Consumer Home Search Experience in {{location}} !" .
            "The latest evolution in Leading-edge Real Estate Search Websites brings you information that was until recently, only available to realtors..." .
            "Twelve months of Sold History in your nearby neighborhoods (asking price and sold price)" .
            "Super useful info for potential Sellers or Buyers who are further along in their process, ready to do some real research." .
            "Our new website gives you this information, going back 12 months and our clients are raving about it!" .
            "Some of the other features you might enjoy..." .
            "Localized Email Updates- Get Updates on just the Areas or Neighborhoods that are of interest to you (Active or Sold Listings)" .
            "Highly Detailed Search Criteria- If you have Esoteric needs, our search experience delivers the specifics you will want." .
            "Large, easy to navigate Listing Photos - Looking at great properties often brings 35+ Photos. Our navigation makes exploring dream properties easy." .
            "You previously registered on {{link}} and we are confident that you will enjoy and benefit from this enhanced Home Search Experience." .
            "If you need anything feel free to contact me day or night." .
            "You can log in to your account through the link below: \n" .
            "{{link}} " .
            "Your login information: \n" .
            "Username: {{email}} \n" .
            "Temporary Password: {{password}}";
    }

    /**
     * @param $data_map
     * @return string
     */
    public static function getLeadRegisterMailTemplate($data_map)
    {
        return "The bar has been raised on the Consumer Home Search Experience in {{location}} !" .
            "The latest evolution in Leading-edge Real Estate Search Websites brings you information that was until recently, only available to realtors..." .
            "Twelve months of Sold History in your nearby neighborhoods (asking price and sold price)" .
            "Super useful info for potential Sellers or Buyers who are further along in their process, ready to do some real research." .
            "Our new website gives you this information, going back 12 months and our clients are raving about it!" .
            "Some of the other features you might enjoy..." .
            "Localized Email Updates- Get Updates on just the Areas or Neighborhoods that are of interest to you (Active or Sold Listings)" .
            "Highly Detailed Search Criteria- If you have Esoteric needs, our search experience delivers the specifics you will want." .
            "Large, easy to navigate Listing Photos - Looking at great properties often brings 35+ Photos. Our navigation makes exploring dream properties easy." .
            "You previously registered on {{link}} and we are confident that you will enjoy and benefit from this enhanced Home Search Experience." .
            "If you need anything feel free to contact me day or night." .
            "You can log in to your account through the link below: \n" .
            "{{link}} " .
            "Your login information: \n" .
            "Username: {{email}} \n" .
            "Temporary Password: {{password}}";
    }

    /**
     * @return array
     */
    public static function getRootUserData()
    {
        return [];
    }

    /**
     * @return array
     */
    public static function getLeadData()
    {
        return [
            'firstname' => 'Hrant',
            'lastname' => 'Hrant',
            'username' => 'hrant.admin',
            'email' => 'hrant.araqelyan.gn@gmail.com',
            'password' => ('123456'),
        ];
    }

    /**
     * @return string
     */
    public static function getPasswordResetEmailAddress()
    {
        $client = env('APP_URL');
        $client = preg_replace('#^https?://#', '', $client);
        $client_email = $client[0] . 'norreply@' . $client;
        return $client_email;
    }

    /**
     * @return string
     */
    public static function getlayoutFullName()
    {
        $layout_name = Client::get()->getlayoutName();
        if ($layout_name == 'classic') {
            return 'frontend.frontpage.' . Client::get()->getNameEnv();
        } else {
            return 'frontend.frontpage.' . Client::get()->getNameEnv() . '-' . $layout_name;
        }
    }

    /**
     * @return mixed
     */
    public static function getlayoutName()
    {
        return DB::table('settings')->first()->value;
    }

    /**
     * @return string
     */
    public static function getActiveStatus()
    {
        return 'Active';
    }

    /**
     * @return array
     */
    public static function getDefaultFilter()
    {
//        return ['Residential', 'Single Family Res', 'Single Family Detached', 'Detached Single Family', 'Single Family Attached',
//            'Single Family Residential', 'Single Family Residence', 'Single Family', 'SF'];
        return [];
    }

    /**
     * @return array
     */
    public static function getTotalFilterField()
    {
        return ['class'];
    }

    /**
     * @return mixed
     */
    public static function soldListings()
    {
//        return Listings::where('status', '!=', 'Active');
        return Listings::where('status', '=', Client::get()->getClosedStatus());
    }

    /**
     * @param $slug
     * @return string
     */
    public static function setSlugWithoutNumber($slug)
    {
        return ltrim(trim(preg_replace('/[0-9]+/', '', $slug)), '-');
    }

    /**
     * @param $name
     * @return string
     */
    public static function setSlugForH1Tag($name)
    {
        return ltrim(trim(preg_replace('/[0-9]+/', '', $name)), '- ');
    }

    /**
     * @return bool
     */
    public static function isListingDatePublishable()
    {
        return true;
    }

    /**
     * @return bool
     */
    public static function showOnlyOneForSolds()
    {
        return false;
    }

    /**
     * @return string
     */
    public static function getTitleSuffixForActive()
    {
        return "Real Estate";
    }

    /**
     * @return string
     */
    public static function getTitleSuffixForSolds()
    {
        return "Sold Real Estate";
    }

    /**
     * @return bool
     */
    public static function getOldEndOfActiveSlug()
    {
        return false;
    }

    /**
     * @return bool
     */
    public static function getOldEndOfSlug()
    {
        return false;
    }

    /**
     * @return bool
     */
    public static function getOldEndOfSoldSlug()
    {
        return false;
    }

    /**
     * @param $location
     * @return string
     */
    public static function getCondosForSaleByBuildingName($location)
    {
        return '';
    }

    /**
     * @return string
     */
    public static function getCondosIdentifier()
    {
        return 'Condo/Townhouse';
    }

    /**
     * @param $buildingName
     * @return mixed
     */
    public static function handleBuildingNameSpecialCases($buildingName)
    {
        return $buildingName;
    }

    /**
     * @param $filter
     * @param $location
     */
    public static function applyLocationFilter($filter, $location)
    {
        // do nothing;
    }

    /**
     * @param $filter
     * @param $buildingName
     */
    public static function applyBuildingNameFilter($filter, $buildingName)
    {
        // do nothing
    }

    /**
     * @param $buildingName
     * @param $location
     * @return string
     */
    public static function titleForCondoPage($buildingName, $location)
    {
        return '';
    }

    /**
     * @param $request
     * @param $filters
     * @param $applyResidential
     */
    public static function applyTypeFilter($request, $filters, $applyResidential)
    {
        $filters->removeFilter('property_class', '');
        $filters->addFilter('property_class', $request->get('type'));
    }

    /**
     * @return bool
     */
    public static function isFindSubdivisionsByGroupName()
    {
        return false;
    }

    /**
     * @param $column_name
     * @return array|mixed
     */
    public function getColumnMaps($column_name)
    {
        if (array_key_exists($column_name, $this->filtersmap)) {
            return $this->filtersmap[$column_name];
        }
        return [$column_name];
    }

    /**
     * @return array
     */
    public function getOptionsForFindSubdivisions()
    {
        return $this->optionsForFindSubdivisions;
    }

    /**
     * @param $filter
     * @return mixed
     */
    public function doReplacements($filter)
    {
        return $filter;
    }

}
