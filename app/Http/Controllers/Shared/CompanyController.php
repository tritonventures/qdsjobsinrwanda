<?php

namespace App\Http\Controllers\Shared;

use App\DataTables\Shared\CompanyDataTable;
use App\Http\Requests\Shared;
use App\Http\Requests\Shared\CreateCompanyRequest;
use App\Http\Requests\Shared\UpdateCompanyRequest;
use App\Repositories\Shared\CompanyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;
use Response;

class CompanyController extends AppBaseController
{
    /** @var  CompanyRepository */
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepo)
    {
        $this->companyRepository = $companyRepo;
    }

    /**
     * Display a listing of the Company.
     *
     * @param CompanyDataTable $companyDataTable
     * @return Response
     */
    public function index(CompanyDataTable $companyDataTable)
    {
        return $companyDataTable->render('shared.companies.index');
    }

    /**
     * Show the form for creating a new Company.
     *
     * @return Response
     */
    public function create()
    {
        return view('shared.companies.create');
    }

    /**
     * Store a newly created Company in storage.
     *
     * @param CreateCompanyRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyRequest $request)
    {
        $input = $request->all();

        if (!preg_match('@^https?://@', $input["website"])) {
            $input['website'] = "https://" . $input["website"];
        }

        if ($input['logo']) {
            $input['logo'] = $this->imageUpload($input["logo"]);
        }

        $company = $this->companyRepository->create($input);

        Flash::success('Company saved successfully.');

        return redirect(route('shared.companies.index'));
    }

    /**
     * Display the specified Company.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('shared.companies.index'));
        }

        return view('shared.companies.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified Company.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('shared.companies.index'));
        }

        return view('shared.companies.edit')->with('company', $company);
    }

    /**
     * Update the specified Company in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyRequest $request)
    {
        $company = $this->companyRepository->find($id);
        $input = $request->all();

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('shared.companies.index'));
        }
        if ($input['logo']) {
            $input['logo'] = $this->imageUpload($input["logo"]);
        } else {
            $input['logo'] = $company['logo'];
        }
        if (!preg_match('@^https?://@', $input["website"])) {
            $input['website'] = "https://" . $input["website"];
        }
        
        $company = $this->companyRepository->update($input, $id);

        Flash::success('Company updated successfully.');

        return redirect(route('shared.companies.index'));
    }

    /**
     * Remove the specified Company from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('shared.companies.index'));
        }

        $this->companyRepository->delete($id);

        Flash::success('Company deleted successfully.');

        return redirect(route('shared.companies.index'));
    }

    private function imageUpload($image): string
    {
        try {
            $path = realpath(dirname(base_path(), 1) . "/data") . "/images/";
            $filename = time() . ".png";
            $image_path = $path . $filename;
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            Image::make(file_get_contents($image))->save($image_path);
        } catch (\Throwable $th) {
            throw $th;
        }
        return Storage::url("images/$filename");
    }
}
