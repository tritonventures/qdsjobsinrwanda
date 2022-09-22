<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\JobDataTable;
use App\Http\Requests\Admin\CreateJobRequest;
use App\Http\Requests\Admin\UpdateJobRequest;
use App\Repositories\Admin\JobRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Filters\Education;
use App\Models\Admin\Filters\ExperienceListing;
use App\Models\Admin\Filters\Gender;
use App\Models\Admin\Filters\Language;
use App\Models\Admin\Filters\Nationality;
use App\Models\Admin\Filters\Proffession;
use App\Models\Admin\Filters\Salary;
use App\Models\Admin\Job;
use App\Models\Shared\Company;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Response;
use stdClass;

class JobController extends AppBaseController
{
    /** @var  JobRepository */
    private $jobRepository;

    public function __construct(JobRepository $jobRepo)
    {
        $this->jobRepository = $jobRepo;
    }

    /**
     * Display a listing of the Job.
     *
     * @param JobDataTable $jobDataTable
     * @return Response
     */
    public function index(JobDataTable $jobDataTable)
    {
        return $jobDataTable->render('admin.jobs.index');
    }

    public function filter(Request $request, $id)
    {
        session(["jobFilters.proffession" => $request->proffession ? $request->proffession : null]);
        session(["jobFilters.education" => $request->education ? $request->education : null]);
        session(["jobFilters.experience" => $request->experience ? $request->experience : null]);
        session(["jobFilters.salary" => $request->salary ? $request->salary : null]);
        session(["jobFilters.nationality" => $request->nationality ? $request->nationality : null]);
        session(["jobFilters.language" => $request->language ? $request->language : null]);
        session(["jobFilters.gender" => $request->gender ? $request->gender : null]);

        $selected = new stdClass;
        $selected->education = session("filters.education");
        $selected->experience = session("filters.experience");
        $selected->language = session("filters.language");
        $selected->gender = session("filters.gender");
        $selected->nationality = session("filters.nationality");
        $selected->proffession = session("filters.proffession");
        $selected->salary = session("filters.salary");

        return redirect()->route("admin.jobs.show", $id);
    }
    public function clear_filter(Request $request, $id)
    {
        session()->forget(["jobFilters.proffession", "jobFilters.education", "jobFilters.experience", "jobFilters.salary", "jobFilters.nationality", "jobFilters.language", "jobFilters.gender"]);

        return redirect()->route("admin.jobs.show", $id);
    }

    /**
     * Show the form for creating a new Job.
     *
     * @return Response
     */
    public function create()
    {
        $companies = Company::all();
        $nationalities = Nationality::all();
        $proffessions = Proffession::all();
        $languages = Language::all();
        $experiences = ExperienceListing::all();
        $salaries = Salary::all();
        $educations = Education::all();

        return view('admin.jobs.create', compact("companies", "nationalities", "proffessions", "languages", "experiences", "salaries", "educations"));
    }

    /**
     * Store a newly created Job in storage.
     *
     * @param CreateJobRequest $request
     *
     * @return Response
     */
    public function store(CreateJobRequest $request)
    {
        $input = $request->all();
        $input["created_by"] = auth()->user()->id;

        try {
            $job = $this->jobRepository->create($input);
            $job->languages()->sync($input['languages']);

            Flash::success('Job saved successfully.');
        } catch (\Throwable $th) {
            throw $th;
            Flash::error("Failed to create job");
        }


        return redirect(route('admin.jobs.index'));
    }

    /**
     * Display the specified Job.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $query = Job::where("id", $id);

        if (empty($query->first())) {
            Flash::error('Job not found');

            return redirect(route('admin.jobs.index'));
        }


        $job = $this->handleFilters($query)->first();

        $educations = Education::orderBy("name")->pluck('name', 'id');
        $experiences = ExperienceListing::orderBy("min")->pluck('name', 'id');
        $genders = Gender::orderBy("name")->pluck('name', 'id');
        $languages = Language::orderBy("name")->pluck('name', 'id');
        $nationalities = Nationality::orderBy("name")->pluck('name', 'id');
        $proffessions = Proffession::orderBy("name")->pluck('name', 'id');
        $salaries = Salary::orderBy("name")->pluck('name', 'id');

        $selected = new stdClass;
        $selected->education = session("jobFilters.education");
        $selected->experience = session("jobFilters.experience");
        $selected->language = session("jobFilters.language");
        $selected->gender = session("jobFilters.gender");
        $selected->nationality = session("jobFilters.nationality");
        $selected->proffession = session("jobFilters.proffession");
        $selected->salary = session("jobFilters.salary");

        return view('admin.jobs.show', compact("job", "nationalities", "proffessions", "languages", "experiences", "educations", "salaries", "genders", "selected"));
    }

    private function handleFilters($query)
    {
        $query->with('users', function ($query) {
            if (session()->has("jobFilters.experience")) $query->WhereHas("experiences",  function ($q) {
                $q->where('listing_id', session("jobFilters.experience"));
            });

            if (session()->has("jobFilters.education")) $query->WhereHas("educations",  function ($q) {
                $q->where('education_id', session("jobFilters.education"));
            });

            if (session()->has("jobFilters.language")) $query->WhereHas("languages",  function ($q) {
                $q->where('language_id', session("jobFilters.language"));
            });


            if (session()->has("jobFilters.gender")) $query->where("gender_id", session("jobFilters.gender"));

            if (session()->has("jobFilters.nationality")) $query->where("nationality_id", session("jobFilters.nationality"));

            if (session()->has("jobFilters.proffession")) $query->where('proffession_id',  session("jobFilters.proffession"));

            if (session()->has("jobFilters.salary")) $query->where("salary_id", session("jobFilters.salary"));
        });

        return $query->with(["nationality", "proffession", "experience", "education", "salary", "approvedUsers", "languages"]);
    }

    /**
     * Show the form for editing the specified Job.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $job = $this->jobRepository->find($id);

        if (empty($job)) {
            Flash::error('Job not found');

            return redirect(route('admin.jobs.index'));
        }

        $nationalities = Nationality::all();
        $proffessions = Proffession::all();
        $languages = Language::all();
        $experiences = ExperienceListing::all();
        $salaries = Salary::all();
        $educations = Education::all();
        $companies = Company::all();

        return view('admin.jobs.edit', compact("companies", "job", "nationalities", "proffessions", "languages", "experiences", "salaries", "educations"));
    }

    /**
     * Update the specified Job in storage.
     *
     * @param  int              $id
     * @param UpdateJobRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJobRequest $request)
    {
        $job = $this->jobRepository->find($id);
        $inputs = $request->all();

        if (empty($job)) {
            Flash::error('Job not found');

            return redirect(route('admin.jobs.index'));
        }

        try {
            $job = $this->jobRepository->update($inputs, $id);
            $job->languages()->sync($inputs['languages']);

            Flash::success('Job updated successfully.');
        } catch (\Throwable $th) {
            throw $th;
            Flash::error('Failed to update Job.');
        }

        return redirect(route('admin.jobs.index'));
    }

    /**
     * Remove the specified Job from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $job = $this->jobRepository->find($id);

        if (empty($job)) {
            Flash::error('Job not found');

            return redirect(route('admin.jobs.index'));
        }

        $this->jobRepository->delete($id);
        $job->languages()->sync([]);

        Flash::success('Job deleted successfully.');

        return redirect(route('admin.jobs.index'));
    }

    public function approveMember($job_id, $user_id)
    {
        $job = $this->jobRepository->find($job_id);

        if (empty($job)) {
            Flash::error('Job not found');

            return redirect(route('admin.jobs.show', $job_id));
        }

        try {

            $job->approvedUsers()->sync($user_id, false);
            $job->users()->detach($user_id);

            Flash::success('Member approved successfully.');
        } catch (\Throwable $th) {

            Flash::error('Failed to approve member');

            return redirect(route('admin.jobs.show', $job_id));
        }



        return redirect(route('admin.jobs.show', $job_id));
    }
    public function removeMember($job_id, $user_id)
    {
        $job = $this->jobRepository->find($job_id);

        if (empty($job)) {
            Flash::error('Job not found');

            return redirect(route('admin.jobs.show', $job_id));
        }

        try {

            $job->approvedUsers()->detach($user_id);
            $job->users()->sync($user_id, false);

            Flash::success('Member remove successfully.');
        } catch (\Throwable $th) {

            throw $th;

            Flash::error('Failed to remove member');

            return redirect(route('admin.jobs.show', $job_id));
        }



        return redirect(route('admin.jobs.show', $job_id));
    }
}
