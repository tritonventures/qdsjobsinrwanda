<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UserDataTable;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Repositories\Admin\UserRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Filters\Education;
use App\Models\Admin\Filters\Experience;
use App\Models\Admin\Filters\ExperienceListing;
use App\Models\Admin\Filters\Gender;
use App\Models\Admin\Filters\Language;
use App\Models\Admin\Filters\Nationality;
use App\Models\Admin\Filters\Proffession;
use App\Models\Admin\Filters\Salary;
use App\Models\Admin\User as AdminUser;
use App\Models\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Response;
use stdClass;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {

        $educations = Education::orderBy("name")->pluck('name', 'id');
        $experiences = ExperienceListing::orderBy("min")->pluck('name', 'id');
        $genders = Gender::orderBy("name")->pluck('name', 'id');
        $languages = Language::orderBy("name")->pluck('name', 'id');
        $nationalities = Nationality::orderBy("name")->pluck('name', 'id');
        $proffessions = Proffession::orderBy("name")->pluck('name', 'id');
        $salaries = Salary::orderBy("name")->pluck('name', 'id');

        $selected = new stdClass;
        $selected->education = session("filters.education");
        $selected->experience = session("filters.experience");
        $selected->language = session("filters.language");
        $selected->gender = session("filters.gender");
        $selected->nationality = session("filters.nationality");
        $selected->proffession = session("filters.proffession");
        $selected->salary = session("filters.salary");

        return $userDataTable->render('admin.users.index', compact("nationalities", "proffessions", "languages", "experiences", "educations", "salaries", "genders", "selected"));
    }

    public function filter(Request $request)
    {
        session(["filters.proffession" => $request->proffession ? $request->proffession : null]);
        session(["filters.education" => $request->education ? $request->education : null]);
        session(["filters.experience" => $request->experience ? $request->experience : null]);
        session(["filters.salary" => $request->salary ? $request->salary : null]);
        session(["filters.nationality" => $request->nationality ? $request->nationality : null]);
        session(["filters.language" => $request->language ? $request->language : null]);
        session(["filters.gender" => $request->gender ? $request->gender : null]);


        return redirect()->route("admin.users.index");
    }
    public function clear_filter(Request $request)
    {
        session()->forget(["filters.proffession", "filters.education", "filters.experience", "filters.salary", "filters.nationality", "filters.language", "filters.gender"]);

        return redirect()->route("admin.users.index");
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        Flash::success('User saved successfully.');

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }
        $education = $user->education;
        $experience = $user->experience;
        $gender = $user->gender;
        $language = $user->language_id ? Language::find(json_decode($user->language_id))->toArray() : null;
        $nationality = $user->nationality;
        $proffession = $user->proffession;
        $salary = $user->salary;

        return view('admin.users.show', compact('user', "nationality", "proffession", "language", "experience", "education", "salary", "gender"));
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);

        Flash::success('User updated successfully.');

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('admin.users.index'));
    }
}
