<?php
namespace Robust\RealEstate\Repositories\Api;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Note;


/**
 * Class LeadNoteRepository
 * @package Robust\RealEstate\Repositories\Api
 */
class LeadNoteRepository
{
    /**
     * @var Note
     */
    protected $model;
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * LeadNoteRepository constructor.
     * @param Note $model
     */
    public function __construct(Note $model)
    {
        $this->model = $model;
    }
}
