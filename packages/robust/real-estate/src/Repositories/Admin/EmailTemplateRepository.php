<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\RealEstate\Models\EmailTemplate;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;


class EmailTemplateRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    
    public function __construct(EmailTemplate $model)
    {
        $this->model = $model;
    }
}
