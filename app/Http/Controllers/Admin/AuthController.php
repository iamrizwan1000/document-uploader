<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminResource;
use App\Http\Resources\UserResource;
use App\Models\Admin;
use App\Models\User;
use App\Repositories\AuthRepository;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AuthController extends Controller
{

    public function showRegister()
    {
        return Inertia::render('Admin/Auth/Register');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {

        $request = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:admins', 'email'],
            'password' => ['required'],
        ]);

        $user = Admin::create(
            $request
        );

        return Redirect::route('admin.login', $user);

    }

    public function showLogin()
    {
        return Inertia::render('Admin/Auth/Login');
    }


    /**
     * @param Request $request
     * @param AuthRepository $authRepository
     * @param $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request, AuthRepository $authRepository)
    {
        $request->validate([
            'email' => ['required', 'email','exists:admins'],
            'password' => ['required'],
        ]);

        // Login through AuthRepository login method
        $data = $authRepository->login($request->all('email', 'password'), \auth()->guard('admin'));

        // Get response from AuthRepository and redirect according to response
        if ($data->getData()->error != 'true') {
            return redirect()->to(route('admin.dashboard'))->with(['title' => 'Success', 'message' => $data->getData()->message]);
        }else{
            return redirect()->back()->with(['title' => 'Error', 'message' => $data->getData()->message]);

        }

    }


    /**
     * @param UserInterface $userRepository
     * @return \Inertia\Response
     */
    public function profile(UserInterface $userRepository){

        $user = new AdminResource(\auth()->guard('admin')->user());


        return Inertia::render('Admin/Auth/Form',[
            'user' => $user,
        ]);


    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param UserInterface $userRepository
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(\Illuminate\Http\Request $request){

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['nullable'],
        ]);

        try {

            $user = Admin::find(\auth()->guard('admin')->user()->id);
            $user->name = $request['name'];
            $user->email = $request['email'];

            if (isset($request['password'])) {
                $user->password = $request['password'];
            }

            $user->save();

            return redirect()->back()->with(['title' => 'Success', 'message' => 'Updated Successfully']);
        }catch (\Exception $e){

            return redirect()->back()->with(['title' => 'Success', 'message' => 'Not Updated Successfully']);
        }


    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {

            Auth::guard('admin')->logout();

            return Redirect::route('home');
        }
    }

}
