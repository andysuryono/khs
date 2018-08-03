<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudyRequest;
use App\Http\Requests\UpdateStudyRequest;
use App\Repositories\StudyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StudyController extends AppBaseController
{
    /** @var  StudyRepository */
    private $studyRepository;

    public function __construct(StudyRepository $studyRepo)
    {
        $this->studyRepository = $studyRepo;
    }

    /**
     * Display a listing of the Study.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->studyRepository->pushCriteria(new RequestCriteria($request));
        $studies = $this->studyRepository->all();

        return view('studies.index')
            ->with('studies', $studies);
    }

    /**
     * Show the form for creating a new Study.
     *
     * @return Response
     */
    public function create()
    {
        return view('studies.create');
    }

    /**
     * Store a newly created Study in storage.
     *
     * @param CreateStudyRequest $request
     *
     * @return Response
     */
    public function store(CreateStudyRequest $request)
    {
        $input = $request->all();

        $study = $this->studyRepository->create($input);

        Flash::success('Study saved successfully.');

        return redirect(route('studies.index'));
    }

    /**
     * Display the specified Study.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $study = $this->studyRepository->findWithoutFail($id);

        if (empty($study)) {
            Flash::error('Study not found');

            return redirect(route('studies.index'));
        }

        return view('studies.show')->with('study', $study);
    }

    /**
     * Show the form for editing the specified Study.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $study = $this->studyRepository->findWithoutFail($id);

        if (empty($study)) {
            Flash::error('Study not found');

            return redirect(route('studies.index'));
        }

        return view('studies.edit')->with('study', $study);
    }

    /**
     * Update the specified Study in storage.
     *
     * @param  int              $id
     * @param UpdateStudyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudyRequest $request)
    {
        $study = $this->studyRepository->findWithoutFail($id);

        if (empty($study)) {
            Flash::error('Study not found');

            return redirect(route('studies.index'));
        }

        $study = $this->studyRepository->update($request->all(), $id);

        Flash::success('Study updated successfully.');

        return redirect(route('studies.index'));
    }

    /**
     * Remove the specified Study from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $study = $this->studyRepository->findWithoutFail($id);

        if (empty($study)) {
            Flash::error('Study not found');

            return redirect(route('studies.index'));
        }

        $this->studyRepository->delete($id);

        Flash::success('Study deleted successfully.');

        return redirect(route('studies.index'));
    }
}
