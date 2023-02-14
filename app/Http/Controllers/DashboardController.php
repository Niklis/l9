<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard');
    }

    public function users()
    {
        return view('user');
    }

    public function roles()
    {
        return view('role');
    }
    
    public function permissions()
    {
        return view('permission');
    }
}
