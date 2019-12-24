<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Website\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Website\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Website\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\LeadNote;


/**
 * Class NoteRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class NoteRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * @var LeadNote
     */
    protected $model;


    /**
     * NoteRepository constructor.
     * @param LeadNote $model
     */
    public function __construct(LeadNote $model)
    {
        $this->model = $model;
    }

}
