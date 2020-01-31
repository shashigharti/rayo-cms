<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\LeadBookMark;


/**
 * Class BookMarkRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class BookMarkRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * @var LeadBookMark
     */
    protected $model;


    /**
     * BookMarkRepository constructor.
     * @param LeadBookMark $model
     */
    public function __construct(LeadBookMark $model)
    {
        $this->model = $model;
    }

}
