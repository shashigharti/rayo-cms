<?php
namespace Robust\RealEstate\Repositories\Api;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\LeadNote;


/**
 * Class LeadNoteRepository
 * @package Robust\RealEstate\Repositories\Api
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
