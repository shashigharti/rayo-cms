<?php
namespace Robust\Leads\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Robust\Leads\Models\Lead;
use Robust\Leads\Models\LeadMetadata;
use Robust\Leads\Models\Status;
use Robust\Leads\Resources\Lead as LeadResource;
use Robust\Leads\Resources\LeadMetadata as LeadMetadataResource;
use Robust\Leads\Resources\Status as LeadStatusResource;

/**
 * Class CategoryController
 * @package Robust\Pages\Controllers\Admin
 */
class LeadsApiController extends Controller
{
    /**
     * @param \Robust\Leads\Models\Lead $lead
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAll(Lead $lead)
    {
        return LeadResource::collection($lead->paginate(10));
    }

    /**
     * @param $type
     * @param \Robust\Leads\Models\Lead $lead
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getLeadsByType($type, Lead $lead)
    {
        $userArr = $lead->query();

        if ($type == 'unassigned') {
            $userArr->whereNull('agent_id');
        }
        else if ($type == 'assigned')
        {
            $userArr->where('agent_id', '!=', null);
        }
        else if ($type == 'archived')
        {
            $userArr->where('user_type', '=', 'archived');
        }
        else if ($type == 'discarded')
        {
            $userArr->where('user_type', '=', 'discarded');
        }
        else if ($type == 'unregistered')
        {
            $userArr->where('user_type', '=', 'unregistered');
        }
        else if ($type == 'new')
        {
            $userArr->where('leads.created_at', '>', DB::raw('NOW() - INTERVAL 48 HOUR'));
        }
        else if($type == 'all')
        {
            // no condition, let it all flow.
        }
        else
        {
            $userArr->where('user_type', '!=', 'unregistered');
            $userArr->where('user_type', '!=', 'archived');
            $userArr->where('user_type', '!=', 'discarded');
            $userArr->where('user_type', '!=', 'hidden');
        }
        return LeadResource::collection($userArr->paginate(10));
    }

    /**
     * @param $id
     * @param \Robust\Leads\Models\Lead $lead
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getLeadsByAgent($id, Lead $lead)
    {
        $leadArr = $lead->query();

        if ($id == 0) {
            $leadArr->where('agent_id', '!=', null);
        } else {
            $leadArr->where('agent_id', $id);
        }

        return LeadResource::collection($leadArr->paginate(10));

    }

    /**
     * @param \Robust\Leads\Models\LeadMetadata $leadMetadata
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAllMetadata(LeadMetadata $leadMetadata)
    {
        return LeadMetadataResource::collection($leadMetadata->paginate(10));
    }

    /**
     * @param $id
     * @param \Robust\Leads\Models\Lead $lead
     * @return \Robust\Leads\Resources\Lead
     */
    public function getLead($id, Lead $lead)
    {
        return new LeadResource($lead->find($id));
    }

    /**
     * @param $id
     * @param \Robust\Leads\Models\LeadMetadata $leadMetadata
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getLeadMetadata($id, LeadMetadata $leadMetadata)
    {
        return LeadMetadataResource::collection($leadMetadata->where('lead_id', $id)->get());
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Leads\Models\Lead $lead
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Lead $lead)
    {
        try {
            $newLead = $request->all();
            $newLead['password'] = bcrypt($request->get('password'));
            $lead->create($newLead);
            return response()->json(['message' => 'Success']);
        } catch(\Exception $e) {
            return response()->json(['message' => 'Failed to save!', 'error' => $e]);
        }
    }

    /**
     * @param $id
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Leads\Models\Lead $lead
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request, Lead $lead)
    {
        try {
            $updatedLead = $request->all();
            if($request->has('password')) {
                $updatedLead['password'] = bcrypt($request->get('password'));
            }

            $lead->find($id)->update($updatedLead);
            return response()->json(['message' => 'Success']);
        } catch(\Exception $e) {
            return response()->json(['message' => 'Failed to update!', 'error' => $e]);
        }
    }

    /**
     * @param \Robust\Leads\Models\Status $status
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAllStatus(Status $status)
    {
        return LeadStatusResource::collection($status->all());
    }

    /**
     * @param $id
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Leads\Models\Lead $leadModel
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateLeadStatus($id, Request $request, Lead $leadModel)
    {
        $lead = $leadModel->find($id);
        $lead->status_id = $request->status_id;
        if ($lead->save()) {
            return response()->json(['message' => 'Successfully Updated.']);
        }
        return response()->json(['message' => 'Update Failed. Please try again later.']);
    }
}
