<?php
namespace Robust\RealEstate\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\Core\Controllers\Common\Traits\CrudTrait;
use Robust\RealEstate\Repositories\Admin\LeadNoteRepository;

/**
 * Class LeadNotesController
 * @package Robust\RealEstate\Controllers\Admin
 */
class LeadNotesController extends Controller
{
    use CrudTrait;

    /**
     * @var LeadNoteRepository
     */
    protected $model;

    /**
     * LeadNotesController constructor.
     * @param LeadNoteRepository $model
     */
    public function __construct(LeadNoteRepository $model)
    {
        $this->model = $model;
        $this->view = 'admin.leads.details.notes';
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->model->store($data);
        return redirect(route("admin.leads.index"))->with('message', 'Record was successfully saved!!');
    }

}
