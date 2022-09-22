<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->user_type == "admin")
            return redirect('/admin');
        if ($user->user_type == "candidate") {
            if (session()->has('applying.job') && session()->has('applying.jobID')) {
                return redirect(route("apply.job", session('applying.jobID')));
            }
            return redirect(route("candidate.edit"));
        }

        return view('dashboard');
    }
}
