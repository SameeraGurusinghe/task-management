<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Verify that the user is authenticated before allowing access to Application
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard after user successfully logged in.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
