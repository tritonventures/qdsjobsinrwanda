<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Job;
use App\Models\Shared\Internship;
use App\Models\Shared\Tender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayoutAdminController extends Controller
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
        if (Auth::user()->user_type == "candidate")
            return redirect('/candidate');
        $jobs =  Job::count();
        $candidates = User::where("user_type", "candidate")->count();
        $tenders = Tender::count();
        $internships = Internship::count();
        return view('admin.home', compact("jobs", "candidates", "tenders","internships"));
    }
}
