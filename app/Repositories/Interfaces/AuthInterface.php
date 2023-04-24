<?php

namespace App\Repositories\Interfaces;


interface AuthInterface
{


    /**
     * @param array $data
     * @return mixed
     */
    public function register(array $data);


    /**
     * @param array $data
     * @param $auth
     * @return mixed
     */
    public function login(array $data, $auth);
}
