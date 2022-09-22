<?php

namespace App\Http\Controllers\Admin\Filters;

use App\DataTables\Admin\Filters\LanguageDataTable;
use App\Http\Requests\Admin\Filters;
use App\Http\Requests\Admin\Filters\CreateLanguageRequest;
use App\Http\Requests\Admin\Filters\UpdateLanguageRequest;
use App\Repositories\Admin\Filters\LanguageRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LanguageController extends AppBaseController
{
    /** @var  LanguageRepository */
    private $languageRepository;

    public function __construct(LanguageRepository $languageRepo)
    {
        $this->languageRepository = $languageRepo;
    }

    /**
     * Display a listing of the Language.
     *
     * @param LanguageDataTable $languageDataTable
     * @return Response
     */
    public function index(LanguageDataTable $languageDataTable)
    {
        return $languageDataTable->render('admin.filters.languages.index');
    }

    /**
     * Show the form for creating a new Language.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.filters.languages.create');
    }

    /**
     * Store a newly created Language in storage.
     *
     * @param CreateLanguageRequest $request
     *
     * @return Response
     */
    public function store(CreateLanguageRequest $request)
    {
        $input = $request->all();

        $language = $this->languageRepository->create($input);

        Flash::success('Language saved successfully.');

        return redirect(route('admin.filters.languages.index'));
    }

    /**
     * Display the specified Language.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            Flash::error('Language not found');

            return redirect(route('admin.filters.languages.index'));
        }

        return view('admin.filters.languages.show')->with('language', $language);
    }

    /**
     * Show the form for editing the specified Language.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            Flash::error('Language not found');

            return redirect(route('admin.filters.languages.index'));
        }

        return view('admin.filters.languages.edit')->with('language', $language);
    }

    /**
     * Update the specified Language in storage.
     *
     * @param  int              $id
     * @param UpdateLanguageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLanguageRequest $request)
    {
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            Flash::error('Language not found');

            return redirect(route('admin.filters.languages.index'));
        }

        $language = $this->languageRepository->update($request->all(), $id);

        Flash::success('Language updated successfully.');

        return redirect(route('admin.filters.languages.index'));
    }

    /**
     * Remove the specified Language from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            Flash::error('Language not found');

            return redirect(route('admin.filters.languages.index'));
        }

        $this->languageRepository->delete($id);

        Flash::success('Language deleted successfully.');

        return redirect(route('admin.filters.languages.index'));
    }
}
