<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Robust\RealEstate\Helpers\MlsGenerateHelper;
use Robust\RealEstate\Models\MlsDataMap;
use Robust\RealEstate\Models\MlsDataRemap;
use Robust\RealEstate\Models\MlsQuery;
use Robust\RealEstate\Models\MlsUser;

/**
 * Class GenerateMlsDataMap
 * @package Robust\Mls\Console\Commands
 */
class GenerateMlsDataMap extends Command
{
    /**
     * @var string
     */
    protected $signature = 'mls:generate-data-map {id}';

    /**
     * @var string
     */
    protected $description = 'Runs to generate mls resource & class mapping';

    /**
     * GenerateMlsDataMap constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param MlsGenerateHelper $generateHelper
     * @throws \PHRETS\Exceptions\CapabilityUnavailable
     * @throws \PHRETS\Exceptions\MissingConfiguration
     */
    public function handle(MlsGenerateHelper $generateHelper)
    {
        $id = $this->argument('id');
        $mls_user = MlsUser::where('id',$id)->first();
        $login_url = $mls_user->login_url;
        $username = $mls_user->username;
        $password = $mls_user->password;
        if($login_url && $username && $password){
            //clear previous maps
            MlsDataMap::query()->where('mls_user_id',$id)->delete();
            MlsDataRemap::query()->where('mls_user_id',$id)->delete();
            $config =  new \PHRETS\Configuration;
            $config->setLoginUrl($login_url);
            $config->setUsername($username);
            $config->setPassword($password);
            $config->setRetsVersion('1.7.2');
            $method = true;
            $config->setOption('use_post_method', $method);
            $rets = new \PHRETS\Session($config);
            $connect = $rets->login();
            $settings = $generateHelper->getSystemMetaData($rets,$config);
            $metadatas = $settings['metadatas'];
            $method = $settings['method'];
            $resources=$metadatas->getResources();
            $resource_groups = $generateHelper->getGroups($rets,$resources);
            $groups= $resource_groups['groups'];
            $generateHelper->createFieldDetails($groups,$rets,$id);
            $maps = $generateHelper->getMaps();
            $key_fields= $resource_groups['key_fields'];
            foreach ($groups as $resource_key => $resources)
            {
                foreach ($resources as $class_key => $fields)
                {

                    $mls_keys = [];
                    foreach ($fields as $field)
                    {
                       array_push($mls_keys,$field);
                    }
                    $others = [];
                    if($method === true)
                    {
                        $values = $generateHelper->postMlsData($resource_key,$class_key,$rets);
                    }else {
                        $values =  $generateHelper->getMlsData($resource_key,$class_key,$rets,$key_fields);
                    }

                    MlsDataMap::create([
                       'mls_user_id' => $id,
                       'resource' =>$resource_key,
                       'class' => $class_key,
                       'mls_keys' => json_encode($mls_keys),
                       'maps'=> $maps,
                       'other'=> json_encode($others),
                        'mls_data_sample' => json_encode($values),
                    ]);
                    MlsDataRemap::create([
                        'mls_user_id' => $id,
                        'resource' =>$resource_key,
                        'class' => $class_key,
                        'remap_key' => ''
                    ]);
                }
            }
            MlsQuery::updateOrCreate(['mls_user_id'=>$id],[
               'mls_user_id' => $id,
               'query_filter' => json_encode([]),
               'query_limit' => 10
            ]);
        }
    }
}
