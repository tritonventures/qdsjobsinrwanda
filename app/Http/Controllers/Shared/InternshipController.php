<?php

namespace App\Http\Controllers\Shared;

use App\DataTables\Shared\InternshipDataTable;
use App\Http\Requests\Shared;
use App\Http\Requests\Shared\CreateInternshipRequest;
use App\Http\Requests\Shared\UpdateInternshipRequest;
use App\Repositories\Shared\InternshipRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Filters\Education;
use App\Models\Admin\Filters\ExperienceListing;
use App\Models\Admin\Filters\Gender;
use App\Models\Admin\Filters\Language;
use App\Models\Admin\Filters\Nationality;
use App\Models\Admin\Filters\Proffession;
use App\Models\Admin\Filters\Salary;
use App\Models\Shared\Company;
use App\Models\Shared\Internship;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Response;
use stdClass;

class InternshipController extends AppBaseController
{
    /** @var  InternshipRepository */
    private $internshipRepository;

    public function __construct(InternshipRepository $internshipRepo)
    {
        $this->internshipRepository = $internshipRepo;
    }

    /**
     * Display a listing of the Internship.
     *
     * @param InternshipDataTable $internshipDataTable
     * @return Response
     */
    public function index(InternshipDataTable $internshipDataTable)
    {
        return $internshipDataTable->render('shared.internships.index');
    }

    /**
     * Show the form for creating a new Internship.
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

        return view('shared.internships.create', compact("companies", "nationalities", "proffessions", "languages", "experiences", "salaries", "educations"));
    }

    /**
     * Store a newly created Internship in storage.
     *
     * @param CreateInternshipRequest $request
     *
     * @return Response
     */
    public function store(CreateInternshipRequest $request)
    {
        $input = $request->all();
        $input["created_by"] = auth()->user()->id;

        try {
            $internship = $this->internshipRepository->create($input);
            $internship->languages()->sync($input['languages']);

            Flash::success('Internship saved successfully.');
        } catch (\Throwable $th) {
            throw $th;
            Flash::error("Failed to create Internship");
        }

        return redirect(route('shared.internships.index'));
    }

    public function filter(Request $request, $id)
    {
        session(["internshipFilter.proffession" => $request->proffession ? $request->proffession : null]);
        session(["internshipFilter.education" => $request->education ? $request->education : null]);
        session(["internshipFilter.experience" => $request->experience ? $request->experience : null]);
        session(["internshipFilter.salary" => $request->salary ? $request->salary : null]);
        session(["internshipFilter.nationality" => $request->nationality ? $request->nationality : null]);
        session(["internshipFilter.language" => $request->language ? $request->language : null]);
        session(["internshipFilter.gender" => $request->gender ? $request->gender : null]);

        $selected = new stdClass;
        $selected->education = session("filters.education");
        $selected->experience = session("filters.experience");
        $selected->language = session("filters.language");
        $selected->gender = session("filters.gender");
        $selected->nationality = session("filters.nationality");
        $selected->proffession = session("filters.proffession");
        $selected->salary = session("filters.salary");

        return redirect()->route("shared.internships.show", $id);
    }
    public function clear_filter(Request $request, $id)
    {
        session()->forget(["internshipFilter.proffession", "internshipFilter.education", "internshipFilter.experience", "internshipFilter.salary", "internshipFilter.nationality", "internshipFilter.language", "internshipFilter.gender"]);

        return redirect()->route("shared.internships.show", $id);
    }

    /**
     * Display the specified Internship.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $query = Internship::where("id", $id);

        if (empty($query->first())) {
            Flash::error('Internship not found');

            return redirect(route('shared.internships.index'));
        }


        $internship = $this->handleFilters($query)->first();

        $educations = Education::orderBy("name")->pluck('name', 'id');
        $experiences = ExperienceListing::orderBy("min")->pluck('name', 'id');
        $genders = Gender::orderBy("name")->pluck('name', 'id');
        $languages = Language::orderBy("name")->pluck('name', 'id');
        $nationalities = Nationality::orderBy("name")->pluck('name', 'id');
        $proffessions = Proffession::orderBy("name")->pluck('name', 'id');
        $salaries = Salary::orderBy("name")->pluck('name', 'id');

        $selected = new stdClass;
        $selected->education = session("internshipFilters.education");
        $selected->experience = session("internshipFilters.experience");
        $selected->language = session("internshipFilters.language");
        $selected->gender = session("internshipFilters.gender");
        $selected->nationality = session("internshipFilters.nationality");
        $selected->proffession = session("internshipFilters.proffession");
        $selected->salary = session("internshipFilters.salary");

        return view('shared.internships.show', compact("internship", "nationalities", "proffessions", "languages", "experiences", "educations", "salaries", "genders", "selected"));
    }

    private function handleFilters($query)
    {
        $query->with('users', function ($query) {
            if (session()->has("internshipFilters.experience")) $query->WhereHas("experiences",  function ($q) {
                $q->where('listing_id', session("internshipFilters.experience"));
            });

            if (session()->has("internshipFilters.education")) $query->WhereHas("educations",  function ($q) {
                $q->where('education_id', session("internshipFilters.education"));
            });

            if (session()->has("internshipFilters.language")) $query->WhereHas("languages",  function ($q) {
                $q->where('language_id', session("internshipFilters.language"));
            });


            if (session()->has("internshipFilters.gender")) $query->where("gender_id", session("internshipFilters.gender"));

            if (session()->has("internshipFilters.nationality")) $query->where("nationality_id", session("internshipFilters.nationality"));

            if (session()->has("internshipFilters.proffession")) $query->where('proffession_id',  session("internshipFilters.proffession"));

            if (session()->has("internshipFilters.salary")) $query->where("salary_id", session("internshipFilters.salary"));
        });

        return $query->with(["nationality", "proffession", "experience", "education", "salary", "approvedUsers", "languages"]);
    }

    /**
     * Show the form for editing the specified Internship.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $internship = $this->internshipRepository->find($id);

        if (empty($internship)) {
            Flash::error('Internship not found');

            return redirect(route('shared.internships.index'));
        }

        $nationalities = Nationality::all();
        $proffessions = Proffession::all();
        $languages = Language::all();
        $experiences = ExperienceListing::all();
        $salaries = Salary::all();
        $educations = Education::all();
        $companies = Company::all();

        return view('shared.internships.edit', compact("companies", "internship", "nationalities", "proffessions", "languages", "experiences", "salaries", "educations"));
    }

    /**
     * Update the specified Internship in storage.
     *
     * @param  int              $id
     * @param UpdateInternshipRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInternshipRequest $request)
    {
        $internship = $this->internshipRepository->find($id);
        $inputs = $request->all();

        if (empty($internship)) {
            Flash::error('Internship not found');

            return redirect(route('shared.internships.index'));
        }

        try {
            $internship = $this->internshipRepository->update($inputs, $id);
            $internship->languages()->sync($inputs['languages']);

            Flash::success('Internship updated successfully.');
        } catch (\Throwable $th) {
            throw $th;
            Flash::error('Failed to update Internship.');
        }

        return redirect(route('shared.internships.index'));
    }

    /**
     * Remove the specified Internship from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $internship = $this->internshipRepository->find($id);

        if (empty($internship)) {
            Flash::error('Internship not found');

            return redirect(route('shared.internships.index'));
        }

        $this->internshipRepository->delete($id);
        $internship->languages()->sync([]);

        Flash::success('Internship deleted successfully.');

        return redirect(route('shared.internships.index'));
    }


    public function approveMember($internship_id, $user_id)
    {
        $internship = $this->internshipRepository->find($internship_id);

        if (empty($internship)) {
            Flash::error('Internship not found');

            return redirect(route('shared.internship.show', $internship_id));
        }

        try {

            $internship->approvedUsers()->sync($user_id, false);
            $internship->users()->detach($user_id);

            Flash::success('Member approved successfully.');
        } catch (\Throwable $th) {

            Flash::error('Failed to approve member');

            return redirect(route('shared.internship.show', $internship_id));
        }



        return redirect(route('shared.internship.show', $internship_id));
    }
    public function removeMember($internship_id, $user_id)
    {
        $internship = $this->internshipRepository->find($internship_id);

        if (empty($internship)) {
            Flash::error('Internship not found');

            return redirect(route('shared.internship.show', $internship_id));
        }

        try {

            $internship->approvedUsers()->detach($user_id);
            $internship->users()->sync($user_id, false);

            Flash::success('Member remove successfully.');
        } catch (\Throwable $th) {

            throw $th;

            Flash::error('Failed to remove member');

            return redirect(route('shared.internship.show', $internship_id));
        }



        return redirect(route('shared.internship.show', $internship_id));
    }
}
