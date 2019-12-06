<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Style;


/**
 * Class StyleRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class StyleRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * @var Style
     */
    protected $model;


    /**
     * StyleRepository constructor.
     * @param Style $model
     */
    public function __construct(Style $model)
    {
        $this->model = $model;
    }
}
