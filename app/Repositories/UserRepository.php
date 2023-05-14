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
        $searchValue = $request->input('');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $role = $request->input('role');

        $filter = new UserFilter($searchValue);

        $filter
            ->setQuery($filter->getQuery())
            ->setFirstName($first_name)
            ->setUser()
            ->setLastName($last_name)
            ->setEmail($email)
            ->setRole($role);

        return UserResource::collection($filter->getQuery()->paginate(15)->withQueryString());
    }


    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function adminCreateuserForFrontEnd(array $data)
    {

        try {
            $user = new User();
            $user->front_end_id =  front_end_id(10);
            $user->first_name = $data['first_name'];
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];
            $user->linkedin = $data['linkedin'];
            $user->company = $data['company'];
            $user->password = $data['password'];
            $user->email_verified_at = Carbon::now();

            $user->save();


            $user->assignRole($data['role_id']);

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
            $user->first_name = $data['first_name'];
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];


            if (isset($data['password'])) {
                $user->password = $data['password'];
            }

            $user->save();

//            $user->assignRole($data['role_id']['id']);

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
