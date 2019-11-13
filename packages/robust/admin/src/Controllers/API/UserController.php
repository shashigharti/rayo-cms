<?php
namespace Robust\Admin\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Robust\Admin\Models\Permission;
use Robust\Admin\Models\User;
use Robust\Admin\Repositories\Admin\UserRepository;
use Robust\Admin\Requests\UserStoreRequest;
use Robust\Admin\Requests\UserUpdateRequest;
use Robust\Admin\Resources\UserResource;
use Robust\Core\Controllers\API\Traits\CrudTrait;


/**
 * Class UserController
 * @package Robust\Admin\Controllers\API
 */
class UserController extends Controller
{
    use CrudTrait;
    /**
     * @var UserRepository
     */
    protected $model;

    /**
     * UserController constructor.
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->model = $user;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return UserResource::collection($this->model->paginate(10));
    }

    /**
     * @param $id
     * @return UserResource
     */
    public function edit($id)
    {
        return new UserResource($this->model->find($id)->with('roles')->first());
    }

    /**
     * @param UserStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserStoreRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $this->model->store($data);
        return response()->json(['message' => 'Success']);
    }

    /**
     * @param $id
     * @param UserUpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, UserUpdateRequest $request)
    {
        $data = $request->all();
        if(isset($data['password']) && $data['password'] === $data['password_confirmation']){
            $data['password'] = bcrypt($data['password']);
        }
        $this->model->find($id)->update($data);
        return response()->json(['message' => 'Success']);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = $this->model->findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'Success']);
    }

    public function getAgents()
    {
        return $this->model->getUsersByRole('Agents');
    }

    public function getUserPermissions($id)
    {
        //need to refactor
        $roles = DB::table('role_user')->where('user_id',$id)->get();
        $permissions = [];
        foreach ($roles as $role)
        {
            $results = DB::table('permission_role')
                    ->select('permission_id')
                    ->where('role_id',$role->role_id)
                    ->get();
            foreach ($results as $result){
                array_push($permissions,$result->permission_id);
            }
        }
        $permissions = Permission::findMany($permissions);
        return response()->json($permissions);
    }

    public function getUserRoles($id)
    {
        return new UserResource(User::where('id',$id)->with('roles')->first()) ;
    }
}
