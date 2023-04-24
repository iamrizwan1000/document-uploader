<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\Interfaces\AuthInterface;
use App\Repositories\Interfaces\UserInterface;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
{


    use ApiResponse;


    /**
     * @param UserInterface $userRepository
     * @return \Inertia\Response
     */
    public function index(UserInterface $userRepository, Request $request){

        $users = $userRepository->index($request);

        return Inertia::render('Front/User/Index', [
            'searches' => \Illuminate\Support\Facades\Request::only(['first_name','last_name','email']),
            'users' => $users,
        ]);
    }


    /**
     * @param UserInterface $userRepository
     * @return \Inertia\Response
     */
    public function profile(UserInterface $userRepository){

        $user = new UserResource(Auth::user());


        return Inertia::render('Front/User/Form',[
            'user' => $user,
        ]);


    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param UserInterface $userRepository
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(\Illuminate\Http\Request $request, UserInterface $userRepository){

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['nullable'],
        ]);

        try {
            $userRepository->updateProfile($request->all(),Auth::user()->id);


            return redirect()->back()->with(['title' => 'Success', 'message' => 'Updated Successfully']);
        }catch (\Exception $e){

            return redirect()->back()->with(['title' => 'Success', 'message' => 'Not Updated Successfully']);
        }


    }


    /**
     * @return \Inertia\Response
     */
    public function create(){


        return Inertia::render('Front/User/Form');
    }


    /**
     * @param RegisterRequest $registerRequest
     * @param AuthInterface $authRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterRequest $registerRequest, AuthInterface $authRepository){

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
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id){

        $data = User::find($id)->delete();

        return Redirect::back();
    }



}
