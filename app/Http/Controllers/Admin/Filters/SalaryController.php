<?php

namespace App\Http\Controllers\Admin\Filters;

use App\DataTables\Admin\Filters\SalaryDataTable;
use App\Http\Requests\Admin\Filters;
use App\Http\Requests\Admin\Filters\CreateSalaryRequest;
use App\Http\Requests\Admin\Filters\UpdateSalaryRequest;
use App\Repositories\Admin\Filters\SalaryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SalaryController extends AppBaseController
{
    /** @var  SalaryRepository */
    private $salaryRepository;

    public function __construct(SalaryRepository $salaryRepo)
    {
        $this->salaryRepository = $salaryRepo;
    }

    /**
     * Display a listing of the Salary.
     *
     * @param SalaryDataTable $salaryDataTable
     * @return Response
     */
    public function index(SalaryDataTable $salaryDataTable)
    {
        return $salaryDataTable->render('admin.filters.salaries.index');
    }

    /**
     * Show the form for creating a new Salary.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.filters.salaries.create');
    }

    /**
     * Store a newly created Salary in storage.
     *
     * @param CreateSalaryRequest $request
     *
     * @return Response
     */
    public function store(CreateSalaryRequest $request)
    {
        $input = $request->all();

        $salary = $this->salaryRepository->create($input);

        Flash::success('Salary saved successfully.');

        return redirect(route('admin.filters.salaries.index'));
    }

    /**
     * Display the specified Salary.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salary = $this->salaryRepository->find($id);

        if (empty($salary)) {
            Flash::error('Salary not found');

            return redirect(route('admin.filters.salaries.index'));
        }

        return view('admin.filters.salaries.show')->with('salary', $salary);
    }

    /**
     * Show the form for editing the specified Salary.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salary = $this->salaryRepository->find($id);

        if (empty($salary)) {
            Flash::error('Salary not found');

            return redirect(route('admin.filters.salaries.index'));
        }

        return view('admin.filters.salaries.edit')->with('salary', $salary);
    }

    /**
     * Update the specified Salary in storage.
     *
     * @param  int              $id
     * @param UpdateSalaryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalaryRequest $request)
    {
        $salary = $this->salaryRepository->find($id);

        if (empty($salary)) {
            Flash::error('Salary not found');

            return redirect(route('admin.filters.salaries.index'));
        }

        $salary = $this->salaryRepository->update($request->all(), $id);

        Flash::success('Salary updated successfully.');

        return redirect(route('admin.filters.salaries.index'));
    }

    /**
     * Remove the specified Salary from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salary = $this->salaryRepository->find($id);

        if (empty($salary)) {
            Flash::error('Salary not found');

            return redirect(route('admin.filters.salaries.index'));
        }

        $this->salaryRepository->delete($id);

        Flash::success('Salary deleted successfully.');

        return redirect(route('admin.filters.salaries.index'));
    }
}
