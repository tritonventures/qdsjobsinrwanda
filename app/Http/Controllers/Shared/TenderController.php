<?php

namespace App\Http\Controllers\Shared;

use App\DataTables\Shared\TenderDataTable;
use App\Http\Requests\Shared\CreateTenderRequest;
use App\Http\Requests\Shared\UpdateTenderRequest;
use App\Repositories\Shared\TenderRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Filters\Proffession;
use App\Models\Shared\Company;
use App\Models\Shared\Tender;
use Laracasts\Flash\Flash;
use Response;
use Illuminate\Support\Str;

class TenderController extends AppBaseController
{
    /** @var  TenderRepository */
    private $tenderRepository;

    public function __construct(TenderRepository $tenderRepo)
    {
        $this->tenderRepository = $tenderRepo;
    }

    /**
     * Display a listing of the Tender.
     *
     * @param TenderDataTable $tenderDataTable
     * @return Response
     */
    public function index(TenderDataTable $tenderDataTable)
    {
        return $tenderDataTable->render('shared.tenders.index');
    }

    /**
     * Show the form for creating a new Tender.
     *
     * @return Response
     */
    public function create()
    {
        $proffessions = Proffession::all();
        $companies = Company::all();
        return view('shared.tenders.create', compact("proffessions", "companies"));
    }

    /**
     * Store a newly created Tender in storage.
     *
     * @param CreateTenderRequest $request
     *
     * @return Response
     */
    public function store(CreateTenderRequest $request)
    {
        $input = $request->all();

        $input['title_slug'] = Str::slug($input['title'], "_");

        try {
            $tender = $this->tenderRepository->create($input);
            $tender->proffessions()->attach($input["proffessions"]);
            Flash::success('Tender saved successfully.');
        } catch (\Throwable $th) {
            throw $th;
            Flash::error('Failed to save tender.');
        }

        return redirect(route('shared.tenders.index'));
    }

    /**
     * Display the specified Tender.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tender = $this->tenderRepository->find($id);

        if (empty($tender)) {
            Flash::error('Tender not found');

            return redirect(route('shared.tenders.index'));
        }

        return view('shared.tenders.show')->with('tender', $tender);
    }

    /**
     * Show the form for editing the specified Tender.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tender = $this->tenderRepository->find($id);

        if (empty($tender)) {
            Flash::error('Tender not found');

            return redirect(route('shared.tenders.index'));
        }

        $proffessions = Proffession::all();
        $companies = Company::all();

        return view('shared.tenders.edit', compact("tender", "proffessions", "companies"));
    }


    public function publish($id)
    {
        $tender = $this->tenderRepository->find($id);

        if (empty($tender)) {
            Flash::error('Tender not found');

            return redirect(route('shared.tenders.index'));
        }

        $tender->published = !boolval($tender->published);

        Tender::where('id', $tender->id)->update(['published' => $tender->published]);
        return redirect(route('shared.tenders.index'));
    }

    /**
     * Update the specified Tender in storage.
     *
     * @param  int              $id
     * @param UpdateTenderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTenderRequest $request)
    {
        $tender = $this->tenderRepository->find($id);

        if (empty($tender)) {
            Flash::error('Tender not found');

            return redirect(route('shared.tenders.index'));
        }
        $input = $request->all();
        $input['title_slug'] = Str::slug($input['title'], "_");

        try {
            $tender = $this->tenderRepository->update($input, $id);
            $tender->proffessions()->sync($input["proffessions"], false);
            Flash::success('Tender updated successfully.');
        } catch (\Throwable $th) {
            Flash::error('Failed to update Tender.');
        }

        return redirect(route('shared.tenders.index'));
    }

    /**
     * Remove the specified Tender from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tender = $this->tenderRepository->find($id);

        if (empty($tender)) {
            Flash::error('Tender not found');

            return redirect(route('shared.tenders.index'));
        }

        try {
            $tender = $this->tenderRepository->find($id);

            if (empty($tender)) {
                Flash::error('Tender not found');

                return redirect(route('shared.tenders.index'));
            }

            $tender->delete($id);
            $tender->proffessions()->sync([]);

            Flash::success('Tender deleted successfully.');
        } catch (\Throwable $th) {
            Flash::error('Failed to delete Tender.');
        }

        return redirect(route('shared.tenders.index'));
    }
}
