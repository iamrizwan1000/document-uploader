<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {

        $data = 'data';
        return Inertia::render('Admin/Index', [
            'data' => $data
        ]);
    }
}
