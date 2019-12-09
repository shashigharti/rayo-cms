<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Note;


/**
 * Class NoteRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class NoteRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * @var Note
     */
    protected $model;


    /**
     * NoteRepository constructor.
     * @param Note $model
     */
    public function __construct(Note $model)
    {
        $this->model = $model;
    }

}
