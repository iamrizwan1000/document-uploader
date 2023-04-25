<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


class DashboardController extends Controller
{
    public function index(){

        $docs = Document::where('user_id', Auth::user()->id)->get();
        return Inertia::render('Front/dashboard',[
            'docs' => ImageResource::collection($docs)
        ]);
    }

    public function list(){

        $user = User::all();
        return Inertia::render('Front/User/Index',[
            'user' => $user
        ]);
    }
}
