<?php

namespace App\Http\Controllers\Admin\Filters;

use App\DataTables\Admin\Filters\ExperienceDataTable;
use App\Http\Requests\Admin\Filters;
use App\Http\Requests\Admin\Filters\CreateExperienceRequest;
use App\Http\Requests\Admin\Filters\UpdateExperienceRequest;
use App\Repositories\Admin\Filters\ExperienceRepository;
use App\Http\Controllers\AppBaseController;
use Laracasts\Flash\Flash;
use Response;

class ExperienceController extends AppBaseController
{
    /** @var  ExperienceRepository */
    private $experienceRepository;

    public function __construct(ExperienceRepository $experienceRepo)
    {
        $this->experienceRepository = $experienceRepo;
    }

    /**
     * Display a listing of the Experience.
     *
     * @param ExperienceDataTable $experienceDataTable
     * @return Response
     */
    public function index(ExperienceDataTable $experienceDataTable)
    {
        return $experienceDataTable->render('admin.filters.experiences.index');
    }

    /**
     * Show the form for creating a new Experience.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.filters.experiences.create');
    }

    /**
     * Store a newly created Experience in storage.
     *
     * @param CreateExperienceRequest $request
     *
     * @return Response
     */
    public function store(CreateExperienceRequest $request)
    {
        $input = $request->all();

        $input['name'] = ($input["max"] ? $input['min'] . '-' . $input["max"]  : 'More than ' . $input['min']) . " Years";

        $experience = $this->experienceRepository->create($input);

        Flash::success('Experience saved successfully.');

        return redirect(route('admin.filters.experiences.index'));
    }

    /**
     * Display the specified Experience.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $experience = $this->experienceRepository->find($id);

        if (empty($experience)) {
            Flash::error('Experience not found');

            return redirect(route('admin.filters.experiences.index'));
        }

        return view('admin.filters.experiences.show')->with('experience', $experience);
    }

    /**
     * Show the form for editing the specified Experience.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $experience = $this->experienceRepository->find($id);

        if (empty($experience)) {
            Flash::error('Experience not found');

            return redirect(route('admin.filters.experiences.index'));
        }

        return view('admin.filters.experiences.edit')->with('experience', $experience);
    }

    /**
     * Update the specified Experience in storage.
     *
     * @param  int              $id
     * @param UpdateExperienceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExperienceRequest $request)
    {
        $experience = $this->experienceRepository->find($id);

        if (empty($experience)) {
            Flash::error('Experience not found');

            return redirect(route('admin.filters.experiences.index'));
        }

        $experience = $this->experienceRepository->update($request->all(), $id);

        Flash::success('Experience updated successfully.');

        return redirect(route('admin.filters.experiences.index'));
    }

    /**
     * Remove the specified Experience from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $experience = $this->experienceRepository->find($id);

        if (empty($experience)) {
            Flash::error('Experience not found');

            return redirect(route('admin.filters.experiences.index'));
        }

        $this->experienceRepository->delete($id);

        Flash::success('Experience deleted successfully.');

        return redirect(route('admin.filters.experiences.index'));
    }
}
