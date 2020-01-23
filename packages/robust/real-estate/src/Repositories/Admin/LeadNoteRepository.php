<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\LeadNote;

/**
 * Class LeadNoteRepository
 * @package Robust\RealEstate\Repositories\Admin
 */
class LeadNoteRepository
{
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
