<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;

use Robust\RealEstate\Helpers\MlsReportHelper;



class MLsReport extends Command
{
    /**
     * @var string
     */
    protected $signature = 'mls:report {option}';
    protected $types = ['city','county','subdivision','zip','school_district','high_school','area'];

    /**
     * @var string
     */
    protected $description = 'Generate report';



    public function handle(MlsReportHelper $helper)
    {
        $options = $this->argument('option');
        if($options !== 'all')
        {
            $options = explode(',',$options);
            $types = array_intersect($this->types,$options);
            $report_types = $helper->getReportTypes($types);
        } else {
            $report_types = $helper->getReportTypes($this->types);
        }
        foreach ($report_types as $attr => $model)
        {
            $query= $helper->getQuery($model);
            $total = $query->count();
            if($total > 0)
            {
                $select =[
                    'status', 'system_price', 'days_on_mls',
                    'city', 'county', 'zip', 'subdivision',
                    'district', 'input_date'
                ];
                $model_type = $helper->getMorphClass($model);
                //remove previous data
                $helper->removeData($model_type);
                $chunk_count = floor($total / 25);
                $listings = $helper->getListing($attr);
                //load listings data with only selected fields
                $query->chunk($chunk_count,function ($collection) use ($listings,$helper,$attr){
                    foreach ($collection as $result)
                    {
                        if($attr === 'subdivision')
                        {
                            $data = $helper->getSubDivisionReportData();
                        } else
                        {
                            $data = $helper->getReportData($listings,$result->name);
                        }
                        $data['model_id'] = $result->id;
                        $data['model_type'] = get_class($result);
                        $data['slug'] = $result->slug;
                        $data['name'] = $result->name;
                        $data['median_dos'] = $helper->getMedian($attr,$result->name,'days_on_mls',false);
                        $data['median_price_active']= $helper->getMedian($attr,$result->name,'system_price',true);
                        $data['median_price_sold'] = $helper->getMedian($attr,$result->name,'system_price',false);
                        $data['median_price_sold_past_year'] = $helper->getMedian($attr,$result->name,'system_price',false,date('Y') -1);
                        $data['median_price_sold_this_year'] = $helper->getMedian($attr,$result->name,'system_price','false',date('Y'));
                        $helper->createReport($data);
                    }
                });
            }
        }
    }

}
