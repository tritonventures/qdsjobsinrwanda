<?php

namespace App\Http\Controllers;

use App\Models\Admin\Filters\Education;
use App\Models\Admin\Filters\Experience;
use App\Models\Admin\Filters\Language;
use App\Models\Admin\Filters\Nationality;
use App\Models\Admin\Filters\Proffession;
use App\Models\Admin\Filters\Salary;
use App\Models\Admin\Job;
use App\Models\Admin\User;
use App\Models\Shared\Company;
use App\Models\Shared\Internship;
use App\Models\Shared\Tender;
use App\Repositories\Admin\JobRepository;
use App\Repositories\Shared\InternshipRepository;
use App\Repositories\Shared\TenderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL as FacadesURL;
use Laracasts\Flash\Flash;
use PharIo\Manifest\Url;

class HomeController extends Controller
{
    public function __construct(TenderRepository $tenderRepo, JobRepository $jobRepo, InternshipRepository $internRepo)
    {
        $this->tenderRepository = $tenderRepo;
        $this->jobRepository = $jobRepo;
        $this->internshipRepository = $internRepo;
    }


    public function index()
    {
        return view('welcome');
        // return view('suspended');
    }


    public function tenders(Request $request)
    {
        $data = Tender::whereNotNull("company_id")->with("proffessions", "company")->latest()->get();
        return response()->json($data);
    }


    public function jobs(Request $request)
    {
        $data = Job::whereNotNull("company_id")->with(["users:id", "nationality", "proffession", "experience", "education", "salary", "company"])->latest()->get();
        return response()->json($data);
    }

    public function internships(Request $request)
    {
        $data = Internship::whereNotNull("company_id")->with(["users:id", "nationality", "proffession", "experience", "education", "salary", "company"])->latest()->get();
        return response()->json($data);
    }


    public function showTenders(Request $request, $id)
    {
        $tender = $this->tenderRepository->find($id);


        if (empty($tender)) {
            Flash::error('Tender not found');

            return redirect(view('welcome'));
        }

        return view('home.tenders.show')->with('tender', $tender);
    }


    public function applyTender(Request $request, $id)
    {
        $tender = $this->tenderRepository->find($id);

        if (empty($tender)) {
            Flash::error('Tender not found');

            return redirect(view('welcome'));
        } else if (!$tender->website_link) {
            Flash::error('Tender application link not found');

            return redirect(view('welcome'));
        }
        return redirect($tender->website_link);
    }


    public function showJobs(Request $request, $id)
    {
        $job = Job::with(["nationality", "proffession", "experience", "education", "salary"])->find($id);

        if (empty($job)) {
            Flash::error('Job not found');

            return redirect(view('welcome'));
        }

        $user = auth()->user();

        $applied = empty($user) ? false : (User::wherehas('jobs', function ($q) {
            $user = auth()->user();
            $q->where("user_id", $user->id);
        })->get() ? true : false);


        return view('home.jobs.show', compact("job", "applied"));
    }


    public function applyJob(Request $request, $id)
    {
        $job = $this->jobRepository->find($id);
        $user = auth()->user();

        if (empty($job)) {
            Flash::error('Job not found');

            return redirect(view('welcome'));
        }
        if (empty($user)) {
            session(['applying.job' => true]);
            session(['applying.jobID' => $id]);
            Flash::error('Login First to apply for Job!');
            return  redirect(route("login"));
        } else {
            if ($user->user_type == "admin") {

                Flash::error("Admins can't apply!");
                return  redirect(route("dashboard"));
            }
            try {
                $job->users()->attach($user->id);
                Flash::success("Application sent successfully");
            } catch (\Throwable $e) {
                if ($e->getCode() == 23000) {
                    Flash::error("You have already applied to this job ");
                }
            }
            session()->forget(["applying.job", "applying.jobID"]);
        }

        return redirect(route('show.job', $id));
    }


    public function showInternships(Request $request, $id)
    {
        $internship = Internship::with(["nationality", "proffession", "experience", "education", "salary"])->find($id);

        if (empty($internship)) {
            Flash::error('Internship not found');

            return redirect(view('welcome'));
        }

        $user = auth()->user();

        $applied = empty($user) ? false : (User::wherehas('internships', function ($q) {
            $user = auth()->user();
            $q->where("user_id", $user->id);
        })->get() ? true : false);


        return view('home.internships.show', compact("internship", "applied"));
    }


    public function applyInternship(Request $request, $id)
    {
        $internship = $this->internshipRepository->find($id);
        $user = auth()->user();

        if (empty($internship)) {
            Flash::error('Internship not found');

            return redirect(view('welcome'));
        }
        if (empty($user)) {
            session(['applying.internship' => true]);
            session(['applying.internshipID' => $id]);
            Flash::error('Login First to apply for Job!');
            return  redirect(route("login"));
        } else {
            if ($user->user_type == "admin") {

                Flash::error("Admins can't apply!");
                return  redirect(route("dashboard"));
            }
            try {
                $internship->users()->attach($user->id);
                Flash::success("Application sent successfully");
            } catch (\Throwable $e) {
                if ($e->getCode() == 23000) {
                    Flash::error("You have already applied to this Internship!");
                }
            }
            session()->forget(["applying.internship", "applying.internshipID"]);
        }

        return redirect(route('show.internship', $id));
    }
    public function showPartners()
    {
        $companies = Company::orderBy('name')->get();

        return view('home.partners', compact("companies"));
    }
    public function showTeam()
    {
        return view('home.team');
    }
}
