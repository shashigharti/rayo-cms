<?php


namespace Robust\Mls\Helpers;


use Robust\Mls\Models\MlsFieldDetail;

class MlsGenerateHelper
{

    public function getSystemMetaData($rets,$config)
    {
        $method = true;
        try{
            $metadatas=$rets->GetSystemMetadata();
        }
        catch (\Exception $e)
        {
            $config->setOption('use_post_method', false);
            $rets = new \PHRETS\Session($config);
            $connect = $rets->login();
            $metadatas=$rets->GetSystemMetadata();
            $method = false;
        }
        return ['metadatas' => $metadatas,'method' => $method];
    }

    public function getGroups($rets,$resources)
    {
        $groups = [];
        $key_fields = [];
        foreach($resources as $key=>$resource){
            $keyField = null;
            $groups[$key]=[];
            $resource_collections = collect($resource);
            foreach ($resource_collections as $resource_collection)
            {
                if(is_array($resource_collection) && isset($resource_collection['KeyField']))
                {
                    $keyField = $resource_collection['KeyField'];
                }
            }
            $classes=$resource->getClasses();
            $classes=collect($classes);
            foreach($classes as $class_key=>$class){
                $groups[$key][$class_key]=[];
                $key_fields[$key][$class_key] = $keyField;
            }
        }
        foreach($groups as $res_key => $classes){
            foreach($classes as $class_key=>$class){
                $fields=$rets->GetTableMetadata($res_key,$class_key);
                foreach ($fields as $field)
                {
                    $name = $field->getSystemName();
                    array_push($groups[$res_key][$class_key],$name);
                }
            }
        }
        $resource_group = ['groups' => $groups,'key_fields'=>$key_fields];
        return $resource_group;
    }

    public function getMaps()
    {
        $columns = array_merge(config('mls.columns.listings'),config('mls.columns.listing_details'));
        foreach ($columns as $col)
        {
            $maps[$col] = "";
        }
        return json_encode($maps);
    }

    public function postMlsData($resource_key,$class_key,$rets)
    {
        $values = [];
        try{
            $results = $rets->Search($resource_key,$class_key,'*',['Limit'=>'3']);
            foreach ($results as $result)
            {
                $result = $result->toArray();
                foreach ($result as $key=> $fields)
                {
                    $values[$key] = $results->lists($key);
                }
            }
        }
        catch (\Exception $er){

        }
        return $values;
    }

    public function getMlsData($resource_key,$class_key,$rets,$key_fields)
    {
        $values = [];
        try{
            $keyField = $key_fields[$resource_key][$class_key];
            $results = $rets->Search($resource_key,$class_key,'('.$keyField.'=0+)',['Limit'=>'3']);
            foreach ($results as $result)
            {
                $result = $result->toArray();
                foreach ($result as $key=> $fields)
                {
                    $values[$key] = $results->lists($key);
                }
            }
        }
        catch (\Exception $er)
        {

        }
        return $values;
    }

    public function createFieldDetails($groups,$rets,$id)
    {
        MlsFieldDetail::query()->where('mls_user_id',$id)->delete();
        foreach($groups as $res_key => $classes){
            foreach($classes as $class_key=>$class){
                $fields=$rets->GetTableMetadata($res_key,$class_key);
                foreach ($fields as $field)
                {
                    $field_details = [
                        'system_name' => $field->getSystemName(),
                        'standard_name' => $field->getStandardName(),
                        'db_name' => $field->getDBName(),
                        'short_name' => $field->getShortName(),
                        'long_name' => $field->getLongName(),
                        'max_length' => $field->getMaximumLength(),
                        'resource' => $res_key,
                        'class' => $class_key,
                        'mls_user_id' => $id
                    ];
                    MlsFieldDetail::create($field_details);
                }
            }
        }

    }
}