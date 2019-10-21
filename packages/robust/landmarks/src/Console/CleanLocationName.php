<?php

namespace Robust\LandMarks\Console\Commands;

use Illuminate\Console\Command;
use Robust\LandMarks\Repositories\Admin\SubdivisionRepository;
use Illuminate\Support\Str;


/**
 * Class CleanLocationName
 * @package Robust\Mls\Console\Commands
 */
class CleanLocationName extends Command
{

    /**
     * @var string
     */
    protected $signature = 'clean:location-names';


    /**
     * @var string
     */
    protected $description = 'Clean Location Names';


    /**
     * @var SubdivisionRepository
     */
    protected $model;


    /**
     * CleanLocationName constructor.
     * @param SubdivisionRepository $model
     */
    public function __construct(SubdivisionRepository $model)
    {
        parent::__construct();
        $this->model = $model;
    }


    /**
     *
     */
    public function handle()
    {
        $subdivisions = $this->model->getSubdivisionWithName();
        $bar = $this->output->createProgressBar(count($subdivisions));
        $words = [ '&', 'Acre', 'acre', 'acres', 'Acres', 'additional', 'Additional', 'And', 'and', 'At', 'at',
            'beg', 'Beg', 'daf', 'Daf', 'ex', 'Ex', 'f', 'F', 'Gated', 'gated', 'Lot', 'lot', 'mcr', 'Mcr', 'n', 'N', 'Ne',
            'ne', 'nw', 'Nw', 'Of', 'of', 'Parcel','parcel', 'parcels', 'Parcels', 'Phase', 'phase', 'Pt', 'Rd', 'rd', 'se',
            'Se', 'sec', 'Sec', 'Street', 'street', 'Sw', 'sw', 'th', 'Th', 'Thru', 'thru', 'to', 'To', 'tr', 'Tr', 'unit', 'Unit'
        ];
        foreach ($subdivisions as $key => $subdivision)
        {
            // remove all unwanted characters and numbers except alphabets and spaces
            $cleanedUpName = preg_replace("/[^a-zA-Z\s]/", "", $subdivision->name);
            // after the above step, we are left with some unwanted single character so get rid of them
            $cleanedUpName = preg_replace('/(^| ).( |$)/', '$1', $cleanedUpName);
            foreach ($words as $key => $word) {
                $cleanedUpName = preg_replace("/\b$word\b/", '', $cleanedUpName);
            }


            if($cleanedUpName == '') // means almost everything is getting removed, so its junk hence ignore it
            {
                $cleanedUpName = 'various';
            }
            $positionOfCondo = strpos($cleanedUpName,"Condo");
            if($positionOfCondo != false)
            {
                $cleanedUpName = substr($cleanedUpName, 0, $positionOfCondo);
                $cleanedUpName =  trim($cleanedUpName);
                $cleanedUpName =  $cleanedUpName . " Condos";
            }
            $data = [
              'alternate_name' => $cleanedUpName,
              'alternate_slug' => Str::slug($cleanedUpName,'-')
            ];
            $subdivision->update($data);
            $bar->advance();
        }
        $bar->finish();
    }
}
