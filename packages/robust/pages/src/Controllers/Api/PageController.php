<?php
namespace Robust\Pages\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;
use Robust\Pages\Repositories\Admin\PageRepository;

/**
 * Class PageController
 * @package Robust\Pages\Controllers\Admin
 */
class PageController extends Controller
{
    use ApiTrait;
    /**
     * @var PageRepository
     */
    /**
     * @var PageRepository|string
     */
    protected $model,$resource,$storeRequest,$updateRequest;

    /**
     * PageController constructor.
     * @param PageRepository $model
     */
    public function __construct(PageRepository $model)
    {
        $this->model = $model;
        $this->resource = 'Robust\Pages\Resources\Page';
        $this->storeRequest= [
            "name" => "required",
            "slug" => "unique:pages",
            "category_id" => "required",
            "excerpt" => "max:250",
            "content" => "required"
        ];
        $this->updateRequest= [
            "name" => "required",
            "category_id" => "required",
            "excerpt" => "max:250",
            "content" => "required"
        ];
    }
}
