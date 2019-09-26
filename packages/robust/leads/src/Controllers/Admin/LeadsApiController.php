<?php

namespace Robust\Leads\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Robust\Leads\Models\Lead;
use Robust\Leads\Models\LeadCategory;
use Robust\Leads\Models\LeadMetadata;
use Robust\Leads\Models\Note;
use Robust\Leads\Models\Status;
use Robust\Leads\Models\UserSearch;
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
     * @param \Carbon\Carbon $carbon
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getLeadsByType($type, Lead $lead, Carbon $carbon)
    {
        $userArr = $lead->query();
        $userArr->with('metadata', 'agent');

        if ($type == 'unassigned') {
            $userArr->whereNull('agent_id');
        } else {
            if ($type == 'assigned') {
                $userArr->where('agent_id', '!=', null);
            } else {
                if ($type == 'archived') {
                    $userArr->where('user_type', '=', 'archived');
                } else {
                    if ($type == 'discarded') {
                        $userArr->where('user_type', '=', 'discarded');
                    } else {
                        if ($type == 'unregistered') {
                            $userArr->where('user_type', '=', 'unregistered');
                        } else {
                            if ($type == 'new') {
                                $userArr->where('leads.created_at', '>', DB::raw('NOW() - INTERVAL 48 HOUR'));
                            } else {
                                if ($type == 'all') {
                                    // no condition, get all the leads.
                                } else {
                                    $userArr->where('user_type', '!=', 'unregistered');
                                    $userArr->where('user_type', '!=', 'archived');
                                    $userArr->where('user_type', '!=', 'discarded');
                                    $userArr->where('user_type', '!=', 'hidden');
                                }
                            }
                        }
                    }
                }
            }
        }
        $userArr = $userArr->paginate(30);

        foreach ($userArr as $userDetail) {
            $last_active_user = $userDetail->last_active;
            $userDetail['last_login'] = null;
            $dates_followup = [];

            // Check last_login parsed time
            if ($last_active_user != null) {
                $last_active = Carbon::parse($last_active_user);
//                $last_active_user = strtotime($last_active_user);
                $userDetail['last_login'] = $last_active->diffInMinutes($carbon->now()) < 5 ? 'Online' : $last_active;
            }

            // Get follow ups
            if (isset($userDetail->latestFollowUps) and !empty($userDetail->latestFollowUps)) {
                foreach ($userDetail->latestFollowUps as $single) {
                    if (count($dates_followup) < 2) {
                        $dates_followup[$single->id] = [
                            'date' => $single->date,
                            'note' => $single->note,
                            'type' => $single->type,
                            'agent_id' => $single->agent_id
                        ];
                    }
                }
            }
            $userDetail['latest_followup_dates'] = $dates_followup;
        }

        return LeadResource::collection($userArr);
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
    public function getLead(Lead $lead)
    {
        $lead->load('loginHistory',
            'categories',
            'agent',
            'searches',
            'reports',
            'emails',
            'metadata',
            'activityLog',
            'notes');

        // Calculate login status
        $logins_this_month = [];
        $logins_this_year = [];
        $logins_past_month = [];
        $logins_past_year = [];

        $login_time = $lead->loginHistory->reverse()->first();
        $last_login = null;
        if ($login_time != null) {
            $last_login = Carbon::parse($login_time->time_of_login)->diffForHumans();
            foreach ($lead->loginHistory as $key => $value) {
                if (Carbon::parse($value->time_of_login)->year == Carbon::now()->year && Carbon::parse($value->time_of_login)->month == Carbon::now()->month) {
                    array_push($logins_this_month, $value->time_of_login);
                }
                if (Carbon::parse($value->time_of_login)->year == Carbon::now()->year && Carbon::parse($value->time_of_login)->month == (Carbon::now()->month - 1)) {
                    array_push($logins_past_month, $value->time_of_login);
                }
                if (Carbon::parse($value->time_of_login)->year == Carbon::now()->year) {
                    array_push($logins_this_year, $value->time_of_login);
                }
                if (Carbon::parse($value->time_of_login)->year == (Carbon::now()->year - 1)) {
                    array_push($logins_past_year, $value->time_of_login);
                }
            }
        }
        if ($login_time == null) {
            $last_login = '0';
        }
        $lead['logins'] = [
            'last_login' => $last_login,
            'this_month' => count($logins_this_month),
            'this_year' => count($logins_this_year),
            'last_month' => count($logins_past_month),
            'last_year' => count($logins_past_year),
        ];

        return new LeadResource($lead);
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
        } catch (Exception $e) {
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
            if ($request->has('password')) {
                $updatedLead['password'] = bcrypt($request->get('password'));
            }

            $lead->find($id)->update($updatedLead);
            return response()->json(['message' => 'Success']);
        } catch (Exception $e) {
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


    /**
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Leads\Models\Note $note
     * @param \Robust\Leads\Models\LeadMetadata $leadMetadata
     * @return \Illuminate\Http\JsonResponse
     */
    public function addNote(Request $request, Note $note, LeadMetadata $leadMetadata)
    {
        $user = auth()->user();
        $data = $request->only(['lead_id', 'note_title', 'note']);
        $data['title'] = $data['note_title'];
        unset($data['note_title']);
        $data['agent_id'] = $user->id;

        $result = $note->query()->create($data);
        if ($result) {
            // Also update leads_metadata table
            $meta_data = $leadMetadata->where('lead_id', $request->lead_id)->first();
            if (!empty($meta_data)) {
                $meta_data->notes_count = $note->where('lead_id', $request->lead_id)->count();
                $meta_data->save();
            }

            return response()->json([
                'message' => 'Success'
            ]);
        }

        return response()->json([
            'message' => 'Error occurred while adding Note!'
        ]);
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Leads\Models\Note $note
     * @param \Robust\Leads\Models\LeadMetadata $leadMetadata
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteNote(Request $request, Note $note, LeadMetadata $leadMetadata)
    {
        $note_id = $request->note_id;
        $lead_id = $request->lead_id;

        if (!empty($note_id) && !empty($lead_id)) {
            $note->where('id', $note_id)->delete();
            // Also update leads_metadata table
            $meta_data = $leadMetadata->where('lead_id', $request->lead_id)->first();
            if (!empty($meta_data)) {
                $meta_data->notes_count = $note->where('lead_id', $request->lead_id)->count();
                $meta_data->save();
            }

            return response()->json([
                'message' => 'Successfully Deleted!'
            ]);
        }

        return response()->json([
            'message' => 'Error occurred while deleting Note!'
        ]);
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Leads\Models\Note $noteModel
     * @param \Robust\Leads\Models\LeadMetadata $leadMetadata
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateNote(Request $request, Note $noteModel, LeadMetadata $leadMetadata)
    {
        $noteModel->where('id', $request->note_id)->update([
            'title' => $request->note_title,
            'note' => $request->note
        ]);

        // Update lead metadata for notes
        $notesCount = $noteModel->where('lead_id', $request->lead_id)->count();
        $leadMetadata->where('id', $request->lead_id)->update([
            'notes_count' => $notesCount
        ]);

        return response()->json([
            'message' => 'Success.'
        ]);
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Leads\Models\UserSearch $userSearch
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteLeadSearch($id, UserSearch $userSearch)
    {
        $success = 'Failed to delete!';
        $user_search = $userSearch->find($id);
        if (isset($user_search) && !empty($user_search)) {
            if ($user_search->delete()) {
                $success = 'Success!';
            }
        }
        return response()->json(['message' => $success]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Leads\Models\UserSearch $userSearch
     * @return \Illuminate\Http\JsonResponse
     */
    public function addLeadSearch(Request $request, UserSearch $userSearch)
    {
        try {
            $search = new UserSearch();
            $search->user_id = $request->get('user_id');
            $search->name = $request->get('name');
            $search->frequency = $request->get('frequency');
            $search->content = json_encode($request->get('content'), true);
            $search->reference_time = now();
            $search->save();
            return response()->json(['message' => 'Success']);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed to send', 'error' => $e]);
        }
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Leads\Models\UserSearch $userSearch
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateLeadSearch(Request $request, UserSearch $userSearch)
    {
        try {
            $search = [
                'user_id' => $request->get('user_id'),
                'name' => $request->get('name'),
                'frequency' => $request->get('frequency'),
                'content' => json_encode($request->get('content'), true),
            ];
            $userSearch->where('id', $request->get('id'))->update($search);
            return response()->json(['message' => 'Success']);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed to send', 'error' => $e]);
        }
    }


    /**
     * @param $id
     * @param \Robust\Leads\Models\LeadCategory $leadCategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteLeadCategory($id, LeadCategory $leadCategory)
    {
        $success = 'Failed to delete!';
        $lead_category = $leadCategory->find($id);
        if (isset($lead_category) && !empty($lead_category)) {
            if ($lead_category->delete()) {
                $success = 'Success!';
            }
        }
        return response()->json(['message' => $success]);
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param \Robust\Leads\Models\LeadCategory $leadCategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeLeadCategory(Request $request, LeadCategory $leadCategory)
    {
        try {
            $updatedLeadCategory = $request->all();
            $leadCategory->create($updatedLeadCategory);
            return response()->json(['message' => 'Success']);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed to update!', 'error' => $e]);
        }
    }


}
