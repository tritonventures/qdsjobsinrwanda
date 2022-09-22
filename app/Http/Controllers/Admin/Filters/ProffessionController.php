<?php

namespace App\Http\Controllers\Admin\Filters;

use App\DataTables\Admin\Filters\ProffessionDataTable;
use App\Http\Requests\Admin\Filters;
use App\Http\Requests\Admin\Filters\CreateProffessionRequest;
use App\Http\Requests\Admin\Filters\UpdateProffessionRequest;
use App\Repositories\Admin\Filters\ProffessionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProffessionController extends AppBaseController
{
    /** @var  ProffessionRepository */
    private $proffessionRepository;

    public function __construct(ProffessionRepository $proffessionRepo)
    {
        $this->proffessionRepository = $proffessionRepo;
    }

    /**
     * Display a listing of the Proffession.
     *
     * @param ProffessionDataTable $proffessionDataTable
     * @return Response
     */
    public function index(ProffessionDataTable $proffessionDataTable)
    {
        return $proffessionDataTable->render('admin.filters.proffessions.index');
    }

    /**
     * Show the form for creating a new Proffession.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.filters.proffessions.create');
    }

    /**
     * Store a newly created Proffession in storage.
     *
     * @param CreateProffessionRequest $request
     *
     * @return Response
     */
    public function store(CreateProffessionRequest $request)
    {
        $input = $request->all();

        $proffession = $this->proffessionRepository->create($input);

        Flash::success('Proffession saved successfully.');

        return redirect(route('admin.filters.proffessions.index'));
    }

    /**
     * Display the specified Proffession.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proffession = $this->proffessionRepository->find($id);

        if (empty($proffession)) {
            Flash::error('Proffession not found');

            return redirect(route('admin.filters.proffessions.index'));
        }

        return view('admin.filters.proffessions.show')->with('proffession', $proffession);
    }

    /**
     * Show the form for editing the specified Proffession.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $proffession = $this->proffessionRepository->find($id);

        if (empty($proffession)) {
            Flash::error('Proffession not found');

            return redirect(route('admin.filters.proffessions.index'));
        }

        return view('admin.filters.proffessions.edit')->with('proffession', $proffession);
    }

    /**
     * Update the specified Proffession in storage.
     *
     * @param  int              $id
     * @param UpdateProffessionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProffessionRequest $request)
    {
        $proffession = $this->proffessionRepository->find($id);

        if (empty($proffession)) {
            Flash::error('Proffession not found');

            return redirect(route('admin.filters.proffessions.index'));
        }

        $proffession = $this->proffessionRepository->update($request->all(), $id);

        Flash::success('Proffession updated successfully.');

        return redirect(route('admin.filters.proffessions.index'));
    }

    /**
     * Remove the specified Proffession from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $proffession = $this->proffessionRepository->find($id);

        if (empty($proffession)) {
            Flash::error('Proffession not found');

            return redirect(route('admin.filters.proffessions.index'));
        }

        $this->proffessionRepository->delete($id);

        Flash::success('Proffession deleted successfully.');

        return redirect(route('admin.filters.proffessions.index'));
    }
}
