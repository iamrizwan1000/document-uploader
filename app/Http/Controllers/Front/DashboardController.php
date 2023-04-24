<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;


class DashboardController extends Controller
{
    public function index(){

        return Inertia::render('Front/dashboard');
    }

    public function list(){

        $user = User::all();
        return Inertia::render('Front/User/Index',[
            'user' => $user
        ]);
    }
}
