<?php
namespace Robust\RealEstate\Repositories\API;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Website\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Website\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\LeadNote;


/**
 * Class LeadNoteRepository
 * @package Robust\RealEstate\Repositories\API
 */
class LeadNoteRepository
{
    /**
     * @var LeadNote
     */
    protected $model;
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * LeadNoteRepository constructor.
     * @param LeadNote $model
     */
    public function __construct(LeadNote $model)
    {
        $this->model = $model;
    }
}
