<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\AuthInterface;
use App\Traits\ApiResponse;


class AuthRepository extends BaseRepository implements AuthInterface
{
    use ApiResponse;

    public function __construct(User $user)
    {
        $this->model = $user;
        $this->modelClass = User::class;
    }


    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function register(array $data)
    {
        try {

            $input = $data;
            $input['email_verified_token'] = generateRandomString($data['email']);

            $user = User::create(
                $input
            );

            return $this->success('Registered Successfully',['data' => $user]);
        }catch (\Exception $e){
            return $this->error('Something went Wrong', ['data' => $e]);
        }
    }


    /**
     * @param array $data
     * @param $auth
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function login(array $data, $auth)
    {
        if ($auth->attempt($data)) {

            if ($auth->user()->email_verified_at == null) {
                $auth->logout();
                return $this->error('Please Verify your Email to Login');
            }else{
                return $this->success('Logged in Successfully');
            }
        }else{
            return $this->error('Incorrect Email or Password');
        }
    }
}
