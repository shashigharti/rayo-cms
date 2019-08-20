<?php
namespace Robust\Leads\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Robust\Leads\Models\Lead;
use Robust\Leads\Models\LeadMetadata;
use Robust\Leads\Resources\Lead as LeadResource;
use Robust\Leads\Resources\LeadMetadata as LeadMetadataResource;

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
}
