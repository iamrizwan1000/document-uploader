<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\RoleResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\AuthRepository;
use App\Repositories\Interfaces\UserInterface;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{


    /**
     * @param UserRepository $userRepository
     * @param Request $request
     * @return \Inertia\Response
     */
    public function index(UserRepository $userRepository, Request $request){

        $user = $userRepository->index($request);

        return Inertia::render('Admin/User/Index', [
            'users' => $user,
            'searches' => \Illuminate\Support\Facades\Request::only(['first_name','last_name','email']),
            'deleted_users' => UserResource::collection(User::onlyTrashed()->get()),
        ]);
    }


    /**
     * @return \Inertia\Response
     */
    public function create(){

        return Inertia::render('Admin/User/Form',[
            'roles' => RoleResource::collection(Role::where('guard_name', 'web')->get()),
        ]);
    }


    public function edit($token,$id){

        $user = User::find($id);


        return Inertia::render('Admin/User/Form',[
            'user' => new UserResource($user),
        ]);
    }


    /**
     * @param Request $request
     * @param UserInterface $userRepository
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adminCreateuserForFrontEnd(\Illuminate\Http\Request $request, UserInterface $userRepository, $id){

        $request->validate([
            'first_name' => ['required','min:3','alpha_dash','doesnt_start_with:-,_'],
            'last_name' => ['required'],
            'email' => ['required','unique:users', 'email'],
            'role_id' => ['required'],
            'linkedin' => ['nullable'],
            'company' => ['nullable'],
            'password' => ['required'],
        ]);

        try {
            $userRepository->adminCreateuserForFrontEnd($request->all());


            return redirect()->back()->with(['title' => 'Success', 'message' => 'Saved Successfully']);
        }catch (\Exception $e){

            return redirect()->back()->with(['title' => 'Success', 'message' => 'Not Updated Successfully']);
        }


    }


    /**
     * @param Request $request
     * @param UserInterface $userRepository
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(\Illuminate\Http\Request $request, UserInterface $userRepository, $id){

        $request->validate([
            'first_name' => ['required','min:3','alpha_dash','doesnt_start_with:-,_'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'role_id' => ['required'],
            'linkedin' => ['nullable'],
            'company' => ['nullable'],
            'password' => ['nullable'],
        ]);

        try {
            $userRepository->updateProfile($request->all(),$request['id']);


            return redirect()->back()->with(['title' => 'Success', 'message' => 'Updated Successfully']);
        }catch (\Exception $e){

            return redirect()->back()->with(['title' => 'Success', 'message' => 'Not Updated Successfully']);
        }


    }

    /**
     * @param RegisterRequest $registerRequest
     * @param AuthRepository $authRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterRequest $registerRequest, AuthRepository $authRepository){

        // Register through AuthRepository function
        $user = $authRepository->register($registerRequest->all());

        // Get response from AuthRepository and redirect according to response
        if ($user->getData()->error != 'true') {
            $user = $user->getData()->data->data;

            $user = User::find($user->id);
            $user->email_verified_token = null;
            $user->email_verified_at = Carbon::now();
            $user->parent_id = Auth::user()->id;
            $user->save();


            return redirect()->back()->with(['title' => 'Success', 'message' => "User has been added successfully"]);

        }else{
            return redirect()->back()->with(['title' => 'Error', 'message' => $user->getData()->message]);

        }

    }


    /**
     * @param $token
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function active($token, $id){

        $data = User::withTrashed()->find($id);
        $data->deleted_at = null;
        $data->save();

        return Redirect::back();
    }


    /**
     * @param $token
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($token, $id){

        $data = User::find($id)->delete();

        return Redirect::back();
    }



}
