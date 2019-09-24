<?php

namespace App\Clients;

use App\Page;
use App\UrlRoute;
use View;

/**
 * Class SantaBarbara
 * @package App\Clients
 */
class SantaBarbara extends AbstractClient
{
    /**
     * @var array
     */
    protected $filtersmap = [
        'external_amenities' => ['external_amenities', 'landscaping'],
        'amenities' => ['amenities', 'landscaping'],
        'type' => ['property_setting', 'sub_property_is_set'],
    ];

    /**
     * @var array
     */
    protected $optionsForFindSubdivisions = [
        [
            'name' => 'ZipCode',
            'action' => 'zips',
            'placeholder' => 'Example: 55016, 55018',
        ],
    ];

    /**
     * @return array
     */
    public static function getDefaultSearch()
    {
        return ["filter" => "property_setting", "type" => ['Residential']];
    }

    /**
     * @return mixed|string
     */
    public static function getName()
    {
        return 'Santa Barbara';
    }

    /**
     * @return mixed
     */
    public static function getNameEnv()
    {
        return env('APP_CLIENT');
    }


    /**
     * @return mixed|string
     */
    public static function getEndOfSlug()
    {
        return 'real-estate';
    }

    /**
     * @return mixed|string
     */
    public static function getEndOfActiveSlug()
    {
        return 'real-estate-for-sale';
    }

    /**
     * @return string
     */
    public static function getEndOfSoldSlug()
    {
        return 'sold-real-estate';
    }

    /**
     * @param $data_map
     * @return string
     */
    public static function getLeadImportMailTemplate($data_map)
    {
        return View::make('vendor/notifications/mail-content-import-lead')->with(['data_map' => $data_map])->render();
    }

    /**
     * @param $data_map
     * @return string
     */
    public static function getLeadRegisterMailTemplate($data_map)
    {
        return View::make('vendor/notifications/mail-content-register-lead')->with(['data_map' => $data_map])->render();
    }

    /**
     * @param bool $capitalized
     * @return mixed|string
     */
    public static function getStateShortName($capitalized = true)
    {
        return (($capitalized) ? strtoupper('CA') : strtolower('CA'));
    }

    /**
     * @return array|mixed
     */
    public static function getPropertyClasses()
    {
        return array_keys(self::getPropertyClassesMap());
    }

    /**
     * @return array|mixed
     */
    public static function getPropertyClassesMap()
    {
        return [
            'A' => 'Residential',
            'B' => 'Multifamily',
            // 'D' => 'Commercial',
            'C' => 'Land',
            //'E' => 'Rent',
        ];
    }

    /**
     * @return string
     */
    public static function getNameOrStateShortName(): string
    {
        return 'CA';
    }

    /**
     * @return mixed|string
     */
    public static function getClosedStatus()
    {
        return 'Closed';
    }

    /**
     * @return array|mixed
     */
    public static function getSatisfyingCount()
    {
        return ['sold' => '0', 'active' => '0'];
    }

    /**
     * @return array
     */
    public static function getRootUserData()
    {
        return [
            [
                'firstname' => 'Bax',
                'lastname' => 'Baxes',
                'username' => 'agent',
                'level' => '-',
                'email' => 'test_agent@gmail.com',
                'password' => bcrypt('stoneS3030'),
            ]
        ];
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
    public static function getWhiteListConditionName()
    {
        return '';
    }

    /**
     * @return array
     */
    public static function getWhiteListConditionData()
    {
        return [];
    }

    /**
     * @return array
     */
    public static function getTotalFilter()
    {
        return ['Residential'];
    }

    /**
     * @return array
     */
    public static function getTotalFilterField()
    {
        return ['property_setting'];
    }

    /**
     * @return array|mixed
     */
    public static function getNoticeDistributionList()
    {
        return ['pranav.gawri@gmail.com', 'pranav.gawri@gmail.com'];
    }

    /**
     * @return string
     */
    public static function getPasswordResetEmailAddress()
    {
        return 'support@allsantabarbarahomes.com';
    }

    /**
     * @param $key
     * @return bool|mixed
     */
    public static function getUniquePropertyFilterByKey($key)
    {

        $properties = self::getUniquePropertyFilter();
        return isset($properties[$key]) ? $properties[$key] : false;
    }

    /**
     * @return array
     */
    public static function getUniquePropertyFilter()
    {

        return array(
            'Oceanfront Homes' => array('property' => 'Oceanfront Homes', 'sort' => 'price_desc'),
            'Ocean View Homes' => array(
                'property' => 'Ocean View Homes',
                'type' => ['Residential'],
                'sort' => 'price_desc'
            ),
            'Ocean View Condos' => array('property' => 'Ocean View Condos', 'sort' => 'price_desc'),
            'Homes with pvt. Tennis Court' => array(
                'property' => 'Homes with pvt. Tennis Court',
                'sort' => 'price_desc'
            ),
            'Homes with land' => array('property' => 'Homes with land', 'sort' => 'price_desc'),
            'Horse properties' => array('property' => 'Horse properties', 'sort' => 'price_desc'),
            'Homes with private Pool' => array('property' => 'Homes with private Pool', 'sort' => 'price_desc'),
            'Homes with Pool House' => array('property' => 'Homes with Pool House', 'sort' => 'price_desc'),
            'Panoramic View' => array('property' => 'Panoramic View', 'sort' => 'price_desc'),
            'Guest House' => array('property' => 'Guest House', 'sort' => 'price_desc'),
            'Fixer Uppers' => array('property' => 'Fixer Uppers', 'sort' => 'price_desc'),
            'Distressed Properties' => array('property' => 'Distressed Properties', 'sort' => 'price_desc'),

        );
    }

    /**
     * @param $page_type
     * @return bool|mixed
     */
    public static function isKeyExistInCustomReportTypes($page_type)
    {
        $arr_custom_report_types = self::getCustomReportTypes();
        if (!empty($page_type) && in_array($page_type, array_keys($arr_custom_report_types))) {
            return true;
        }
        return false;
    }

    /**
     * @return array|mixed
     */
    public static function getCustomReportTypes()
    {

        $custom_report_types = [
            'unique_property_sb' => self::getUniquePropertyTitle()
        ];

        return $custom_report_types;
    }

    /**
     * @return mixed
     */
    public static function getUniquePropertyTitle()
    {

        $data['Oceanfront Homes'] = 'Oceanfront Homes';
        $data['Ocean View Homes'] = 'Ocean View Homes';
        $data['Ocean View Condos'] = 'Ocean View Condos';
        $data['Homes With Pvt Tennis Court'] = 'Homes with pvt. Tennis Court';
        $data['Homes With Land'] = 'Homes with land';
        $data['Horse Properties'] = 'Horse properties';
        $data['Homes With Private Pool'] = 'Homes with private Pool';
        $data['Homes With Pool House'] = 'Homes with Pool House';
        $data['Panoramic View'] = 'Panoramic View';
        $data['Guest House'] = 'Guest House';
        $data['Fixer Uppers'] = 'Fixer Uppers';
        $data['Distressed Properties'] = 'Distressed Properties';

        return $data;
    }

    /**
     * @param $page_type
     * @param $uniqueProperties
     * @return mixed|void
     */
    public static function getCustomPages($page_type, $uniqueProperties)
    {

        $format = [
            'unique_property_sb' => [
                'active' => [
                    'page_type' => 'unique_property_sb',
                    'default_filters' => 'Filters {{unique_property}}',
                    'area' => '{{unique_property}}',
                    'slug' => '/{{unique_property_slug}}',
                    'title' => '{{unique_property}} for Sale | {{unique_property}} MLS Home Listings',
                    'url' => 'property/{{unique_property_slug}}/ca/real-estate-for-sale',
                    'content' => '<h2>{{unique_property}} for Sale</h2> <h2>{{unique_property}} MLS Home Listings</h2>',
                    'title' => '{{unique_property}} for Sale | {{unique_property}} MLS Home Listings',
                    'meta_title' => '{{unique_property}} for Sale in Santa Barbara CA,  | {{unique_property}} Listings',
                    'meta_description' => '{{unique_property}} for Sale in  Santa Barbara CA. {{unique_property}} Listings Updated Hourly.',
                    'meta_keywords' => '"Santa Barbara {{unique_property}} for Sale, {{unique_property}} in Santa Barbara CA, Santa Barbara MLS {{unique_property}}, Santa Barbara {{unique_property}} listings, Santa Barbara {{unique_property}}',

                ]
            ]
        ];

        foreach ($uniqueProperties as $unique_property) {

            $unique_property_slug = strtolower(trim(str_replace(' ', '-', $unique_property)));
            $page_format_arr = $format[$page_type];
            $page_arr = [];
            foreach ($page_format_arr as $status => $base_template) {

                $replacements = [
                    '{{unique_property}}' => $unique_property,
                    '{{unique_property_slug}}' => $unique_property_slug
                ];

                foreach ($replacements as $search => $replace) {
                    $base_template = str_replace($search, $replace, $base_template);
                }
                $page_arr[] = $base_template;
                $page_arr_filtered = [];
                foreach ($page_arr as $page) {
                    $page['created_at'] = date('Y-m-d H:i:s');
                    $page['updated_at'] = date('Y-m-d H:i:s');
                    if (!Page::where('slug', $page['slug'])->first()) {
                        $page_arr_filtered[] = $page;
                    }
                }
            }
            if ($page_arr_filtered) {
                Page::insert($page_arr_filtered);
            }
        }
    }
}
