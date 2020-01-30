<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\SentEmails;


/**
 * Class SentEmailRepository
 * @package Robust\RealEstate\Repositories\Admin
 */
class SentEmailRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;


    /**
     * @var SentEmails
     */
    protected $model;

    /**
     * SentEmailRepository constructor.
     * @param SentEmails $model
     */
    public function __construct(SentEmails $model)
    {
        $this->model = $model;
    }

}
