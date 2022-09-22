<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Admin\Filters\Education;
use App\Models\Admin\Filters\Experience;
use App\Models\Admin\Filters\ExperienceListing;
use App\Models\Admin\Filters\Gender;
use App\Models\Admin\Filters\Language;
use App\Models\Admin\Filters\Nationality;
use App\Models\Admin\Filters\Proffession;
use App\Models\Admin\Filters\Salary;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use stdClass;

class LayoutCandidateController extends Controller
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

        if (empty($user)) {
            Flash::error("Login First");
            return redirect("/login");
        }

        if ($user->user_type == "admin")
            return redirect('/admin');

        return view("candidate.home", compact("user"));
    }

    public function edit()
    {
        $user = Auth::user();

        if (empty($user)) {
            Flash::error("User not found");
            return redirect()->route("dashboard");
        }

        $educations = Education::all();
        $genders = Gender::all();
        $languages = Language::all();
        $nationalities = Nationality::all();
        $proffessions = Proffession::orderBy("name")->get();
        $salaries = Salary::all();

        return view("candidate.edit", compact("user", "nationalities", "proffessions", "languages", "educations", "salaries", "genders"));
    }
    
    private function getExperienceId(Datetime $date1, DateTime $date2)
    {
        $interval = $date1 >= $date2 ? $date1->diff($date2) : $date2->diff($date1);
        $exp = ExperienceListing::orderBy('min', 'desc')->where("min", "<=", $interval->y)->first();

        if (empty($exp)) {
            return null;
        }
        return $exp->id;
    }

    public function update(Request $request)
    {
        $inputs = $request->all();


        $user = User::find(auth()->user()->id);
        $user->update([
            'names' => $request['names'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],
            'nationality_id' => $request['nationality'],
            'gender_id' => $request['gender'],
            'dob' => $request['dob'] ? date($request['dob']) : null,
            'skills' => $request['skills'],
            'is_employed' => $request['is_employed'],
            'proffession_id' => $request['proffession'],
            'salary_id' => $request['salary'],
        ]);

        $experiences = Experience::where("user_id", $user->id);
        $experiences_copy = $experiences;
        $experiences->delete();
        if (!empty($inputs['companies'])) {
            try {
                foreach ($inputs['companies'] as $i => $value) {
                    $listing_id = $this->getExperienceId(new DateTime($inputs['start_dates'][$i]), new DateTime($inputs['end_dates'][$i]));

                    Experience::create([
                        "user_id" => $user->id,
                        "company" => $inputs['companies'][$i],
                        "position" => $inputs['positions'][$i],
                        "start_date" => $inputs['start_dates'][$i],
                        "end_date" => $inputs['end_dates'][$i],
                        "listing_id" => $listing_id,
                    ]);
                }
            } catch (\Throwable $th) {
                $experiences = Experience::where("user_id", $user->id);
                $experiences->delete();
                $experiences_copy->create();
                throw $th;
            }
        }


        try {
            $user->languages()->sync([]);
            $user->languages()->sync($request['languages'], false);
            $user->educations()->sync([]);
            if (!empty($inputs['education'])) {
                foreach ($inputs['education'] as $i => $value) {
                    try {
                        $user->educations()->sync([
                            [
                                "education_id" => $request['education'][$i],
                                "user_id" => $user->id,
                                "school_name" => $request['school_name'][$i],
                                "start_date" => $request['start_date'][$i],
                                "end_date" => $request['end_date'][$i]
                            ]
                        ], false);
                    } catch (\Throwable $th) {
                    }
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }

        Flash::success('Profile saved successfully.');

        return redirect()->route("candidate.dashboard");
    }
}
