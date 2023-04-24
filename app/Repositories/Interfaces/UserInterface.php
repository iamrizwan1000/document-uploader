<?php

namespace App\Repositories\Interfaces;


use Illuminate\Http\Request;

interface UserInterface
{


    public function index(Request $request);


    /**
     * @param array $data
     * @return mixed
     */
    public function updateProfile(array $data,$id);/**
     * @param array $data
     * @return mixed
     */


    public function adminCreateuserForFrontEnd(array $data);


    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data);


    /**
     * @param $id
     * @return mixed
     */
    public function edit($id);


    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);


    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);
}
