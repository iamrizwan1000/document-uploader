<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthResendVerifyEmailRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Resources\UserResource;
use App\Mail\ResetEmail;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Repositories\Interfaces\AuthInterface;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AuthController extends Controller
{

    use ApiResponse;

    /**
     * Method to show Registration page
     * @return \Inertia\Response
     */
    public function showRegister()
    {
        return Inertia::render('Front/Auth/Register');
    }


    /**
     * @param RegisterRequest $registerRequest
     * @param AuthInterface $authRepository
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response
     */
    public function register(RegisterRequest $registerRequest, AuthInterface $authRepository)
    {

        // Register through AuthRepository function
        $user = $authRepository->register($registerRequest->all());

        // Get response from AuthRepository and redirect according to response
        if ($user->getData()->error != 'true') {
            $user = $user->getData()->data->data;

            // Below function will send confirmation email to user, Queue needs to be added later.
            Mail::to($user->email)->send(new VerifyEmail($user));

            return Inertia::render('Components/Success',[
                'user' => $user,
                'success' => 'Congratulations',
                'message' => 'Verification email has been sent to your email at '. $user->email .' please verify email and login to continue',
            ]);
        }else{
            return redirect()->back()->with(['title' => 'Error', 'message' => $user->getData()->message]);

        }

    }


    /**
     * Method to show Login page
     * @return \Inertia\Response
     */
    public function showLogin()
    {
        return Inertia::render('Front/Auth/Login');
    }


    /**
     * @param AuthInterface $authRepository
     * @param $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function jumpToDashboard(AuthInterface $authRepository,$token){

//        $verify = User::whereEmailVerifiedToken($token)->first();
//
//        Auth::loginUsingId($verify->id);

        return redirect()->to('/login');
    }


    /**
     * @param LoginRequest $loginRequest
     * @param AuthInterface $authRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $loginRequest, AuthInterface $authRepository)
    {
        // Login through AuthRepository login method
        $data = $authRepository->login($loginRequest->all('email', 'password'), \auth());

        // Get response from AuthRepository and redirect according to response
        if ($data->getData()->error != 'true') {
            return redirect()->to('/dashboard')->with(['title' => 'Success', 'message' => $data->getData()->message]);
        }else{
            return redirect()->back()->with(['title' => 'Error', 'message' => $data->getData()->message]);

        }

    }


    /**
     * Logout
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return Redirect::route('login');
        }
    }


    /**
     * will check user token in url if that is correct then
     * it will add current date in email verified at column so user could login
     * Method for Email Verification
     * @param $token
     * @return \Illuminate\Http\JsonResponse|\Inertia\Response
     */
    public function verifyEmail($token){

        try {
            $verify = User::whereEmailVerifiedToken($token)->first();

            if (!$verify) {
                return Inertia::render('Components/Page404');
            }

            $verify->email_verified_at = Carbon::now()->timestamp;
//            $verify->email_verified_token = null;

            $verify->save();
            return Inertia::render('Components/Congratulations',[
                'user' => new UserResource($verify),
                'token' => $token,
                'success' => 'Congratulations',
                'message' => 'Your email'. $verify->email .' has been verified',
            ]);
        }catch (\Exception $e){
            return $this->error($e->getMessage());
        }
    }


    /**
     * Method to show forgotPassword page
     * @return \Inertia\Response
     */
    public function forgotPassword()
    {
        return Inertia::render('Front/Auth/ForgotPassword');
    }


    /**
     * check user email exist or not for password reset, if exist then send reset link to user email
     * or will send error message that email does not exist
     * @param AuthResendVerifyEmailRequest $authResendVerifyEmailRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(AuthResendVerifyEmailRequest $authResendVerifyEmailRequest){

        try {
            $user = User::whereEmail($authResendVerifyEmailRequest['email'])->first();
            $user->email_verified_token = generateRandomString($authResendVerifyEmailRequest['email']);
            $user->save();

            // Below function will send confirmation email to user, Queue needs to be added later.
            Mail::to($user->email)->send(new ResetEmail($user));

            return Inertia::render('Components/Verify',[
                'user' => new UserResource($user),
                'success' => 'Congratulations',
                'message' => 'Reset password link has been sent to your email at '. $user->email .' please click reset your password',
            ]);

        }catch (\Exception $e){
            return $this->error($e->getMessage(), 500);
        }
    }




    /**
     * On register if email is not received then this function will send email again upon clicking resend email button
     * @param AuthResendVerifyEmailRequest $authResendVerifyEmailRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function resendVerifyEmail(AuthResendVerifyEmailRequest $authResendVerifyEmailRequest){

        try {
            $user = User::whereEmail($authResendVerifyEmailRequest['email'])->first();
            $user->email_verified_token = generateRandomString($authResendVerifyEmailRequest['email']);
            $user->save();

            // Below function will send confirmation email to user, Queue needs to be added later.
            Mail::to($authResendVerifyEmailRequest['email'])->send(new VerifyEmail($user));

            return $this->success([
            ],'Confirmation email has been sent again to your Email please approve to continue to login');
        }catch (\Exception $e){
            return $this->error($e->getMessage(), 500);
        }
    }


    /**
     * if token is passed incorrectly it will show error page
     * @return \Inertia\Response
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function resetEmailPassword(){

        $token = \request()->get('reset');
        $verify = User::whereEmailVerifiedToken($token)->first();

        if (!$verify) {
            return Inertia::render('Components/Page404');
        }

        return Inertia::render('Front/Auth/UpdatePassword');
    }


    /**
     * Password will be updated on this function
     * @param UpdatePasswordRequest $updatePasswordRequest
     * @return \Illuminate\Http\JsonResponse|\Inertia\Response
     */
    public function updatePassword(UpdatePasswordRequest $updatePasswordRequest){

        try {
            $token = \url()->previous();
            $token = substr($token, strpos($token, "reset=") + 6);

            $user = User::whereEmailVerifiedToken($token)->first();

            if (!$user) {
                return Inertia::render('Components/Page404');
            }

            $data = User::whereId($user->id)->update([
                'password' => Hash::make($updatePasswordRequest['password'])
            ]);

            return Inertia::render('Components/Congratulations',[
                'user' => new UserResource(User::find($user->id)),
                'success' => 'Congratulations',
                'message' => 'Password has been Updated Successfully',
            ]);
        }catch (\Exception $e){
            return $this->error($e->getMessage(), 500);
        }

    }

}
