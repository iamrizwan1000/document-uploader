<?php

namespace App\Repositories;


use App\Filters\ClicktoAccountFilter;
use App\Filters\RoleFilter;
use App\Filters\UserFilter;
use App\Http\Resources\ClicktoAccountResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\Interfaces\UserInterface;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class UserRepository extends BaseRepository implements UserInterface
{

    use ApiResponse;

    public function __construct(User $user)
    {
        $this->model = $user;

        $this->modelClass = User::class;
    }


    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return UserResource::collection(User::all());
    }


    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function adminCreateuserForFrontEnd(array $data)
    {

        try {
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->email_verified_at = Carbon::now();

            $user->save();

            return $user;
        }catch (\Exception $e){

            return $this->error('Something went Wrong', ['data' => $e]);
        }
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function updateProfile(array $data,$id)
    {
        try {
            $user = User::find($id);
            $user->name = $data['name'];
            $user->email = $data['email'];

            if (isset($data['password'])) {
                $user->password = $data['password'];
            }

            $user->save();


            return $user;
        }catch (\Exception $e){

            return $this->error('Something went Wrong', ['data' => $e]);
        }
    }


    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function store(array $data)
    {
        try {
            $role = Role::create(
                [
                    'name' => $data['name'],
                    'guard_name' => 'web'
                ]
            );

            $role->givePermissionTo($data['checkedPermission']);

            return $this->success('Saved Successfully', ['data' => $role]);
        }catch (\Exception $e){

            return $this->error('Something went Wrong', ['data' => $e]);
        }
    }


    /**
     * @param $id
     * @return void
     */
    public function edit($id)
    {
        // TODO: Implement edit() method.
    }


    /**
     * @param $id
     * @param $data
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function update($id, $data)
    {
        try {
            $role = Role::updateOrCreate([
                'id' => $data['id']
            ],[
                'name' => $data['name'],
                'guard_name' => 'web'
            ]);

            $role->syncPermissions($data['checkedPermission']);

            return $this->success('Saved Successfully', ['data' => $role]);
        }catch (\Exception $e){

            return $this->error('Something went Wrong', ['data' => $e]);
        }
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

}
