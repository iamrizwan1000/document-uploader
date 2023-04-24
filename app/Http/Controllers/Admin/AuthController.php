<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Repositories\AuthRepository;
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
