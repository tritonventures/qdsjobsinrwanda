<?php

namespace App\Http\Controllers\Admin\Filters;

use App\DataTables\Admin\Filters\NationalityDataTable;
use App\Http\Requests\Admin\Filters;
use App\Http\Requests\Admin\Filters\CreateNationalityRequest;
use App\Http\Requests\Admin\Filters\UpdateNationalityRequest;
use App\Repositories\Admin\Filters\NationalityRepository;
use App\Http\Controllers\AppBaseController;
use Laracasts\Flash\Flash;
use Response;

class NationalityController extends AppBaseController
{
    /** @var  NationalityRepository */
    private $nationalityRepository;

    public function __construct(NationalityRepository $nationalityRepo)
    {
        $this->nationalityRepository = $nationalityRepo;
    }

    /**
     * Display a listing of the Nationality.
     *
     * @param NationalityDataTable $nationalityDataTable
     * @return Response
     */
    public function index(NationalityDataTable $nationalityDataTable)
    {
        return $nationalityDataTable->render('admin.filters.nationalities.index');
    }

    /**
     * Show the form for creating a new Nationality.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.filters.nationalities.create');
    }

    /**
     * Store a newly created Nationality in storage.
     *
     * @param CreateNationalityRequest $request
     *
     * @return Response
     */
    public function store(CreateNationalityRequest $request)
    {
        $input = $request->all();

        $nationality = $this->nationalityRepository->create($input);

        Flash::success('Nationality saved successfully.');

        return redirect(route('admin.filters.nationalities.index'));
    }

    /**
     * Display the specified Nationality.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nationality = $this->nationalityRepository->find($id);

        if (empty($nationality)) {
            Flash::error('Nationality not found');

            return redirect(route('admin.filters.nationalities.index'));
        }

        return view('admin.filters.nationalities.show')->with('nationality', $nationality);
    }

    /**
     * Show the form for editing the specified Nationality.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nationality = $this->nationalityRepository->find($id);

        if (empty($nationality)) {
            Flash::error('Nationality not found');

            return redirect(route('admin.filters.nationalities.index'));
        }

        return view('admin.filters.nationalities.edit')->with('nationality', $nationality);
    }

    /**
     * Update the specified Nationality in storage.
     *
     * @param  int              $id
     * @param UpdateNationalityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNationalityRequest $request)
    {
        $nationality = $this->nationalityRepository->find($id);

        if (empty($nationality)) {
            Flash::error('Nationality not found');

            return redirect(route('admin.filters.nationalities.index'));
        }

        $nationality = $this->nationalityRepository->update($request->all(), $id);

        Flash::success('Nationality updated successfully.');

        return redirect(route('admin.filters.nationalities.index'));
    }

    /**
     * Remove the specified Nationality from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nationality = $this->nationalityRepository->find($id);

        if (empty($nationality)) {
            Flash::error('Nationality not found');

            return redirect(route('admin.filters.nationalities.index'));
        }

        $this->nationalityRepository->delete($id);

        Flash::success('Nationality deleted successfully.');

        return redirect(route('admin.filters.nationalities.index'));
    }
}
