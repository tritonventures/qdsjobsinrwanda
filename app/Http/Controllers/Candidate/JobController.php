<?php

namespace App\Http\Controllers\Candidate;

use App\DataTables\Candidate\JobDataTable;
use App\Http\Requests\Candidate;
use App\Http\Requests\Candidate\CreateJobRequest;
use App\Http\Requests\Candidate\UpdateJobRequest;
use App\Repositories\Candidate\JobRepository;
use App\Http\Controllers\AppBaseController;
use Laracasts\Flash\Flash;
use Response;

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
        return $jobDataTable->render('candidate.jobs.index');
    }

    /**
     * Show the form for creating a new Job.
     *
     * @return Response
     */
    public function create()
    {
        return view('candidate.jobs.create');
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

        $job = $this->jobRepository->create($input);

        Flash::success('Job saved successfully.');

        return redirect(route('candidate.jobs.index'));
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
        $job = $this->jobRepository->find($id);

        if (empty($job)) {
            Flash::error('Job not found');

            return redirect(route('candidate.jobs.index'));
        }

        return view('candidate.jobs.show')->with('job', $job);
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

            return redirect(route('candidate.jobs.index'));
        }

        return view('candidate.jobs.edit')->with('job', $job);
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

        if (empty($job)) {
            Flash::error('Job not found');

            return redirect(route('candidate.jobs.index'));
        }

        $job = $this->jobRepository->update($request->all(), $id);

        Flash::success('Job updated successfully.');

        return redirect(route('candidate.jobs.index'));
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

            return redirect(route('candidate.jobs.index'));
        }

        $this->jobRepository->delete($id);

        Flash::success('Job deleted successfully.');

        return redirect(route('candidate.jobs.index'));
    }
}
