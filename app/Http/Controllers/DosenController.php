<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDosenRequest;
use App\Http\Requests\UpdateDosenRequest;
use App\Repositories\DosenRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DosenController extends AppBaseController
{
    /** @var  DosenRepository */
    private $dosenRepository;

    public function __construct(DosenRepository $dosenRepo)
    {
        $this->dosenRepository = $dosenRepo;
    }

    /**
     * Display a listing of the Dosen.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dosenRepository->pushCriteria(new RequestCriteria($request));
        $dosens = $this->dosenRepository->all();

        return view('dosens.index')
            ->with('dosens', $dosens);
    }

    /**
     * Show the form for creating a new Dosen.
     *
     * @return Response
     */
    public function create()
    {
        return view('dosens.create');
    }

    /**
     * Store a newly created Dosen in storage.
     *
     * @param CreateDosenRequest $request
     *
     * @return Response
     */
    public function store(CreateDosenRequest $request)
    {
        $input = $request->all();

        $dosen = $this->dosenRepository->create($input);

        Flash::success('Dosen saved successfully.');

        return redirect(route('dosens.index'));
    }

    /**
     * Display the specified Dosen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dosen = $this->dosenRepository->findWithoutFail($id);

        if (empty($dosen)) {
            Flash::error('Dosen not found');

            return redirect(route('dosens.index'));
        }

        return view('dosens.show')->with('dosen', $dosen);
    }

    /**
     * Show the form for editing the specified Dosen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dosen = $this->dosenRepository->findWithoutFail($id);

        if (empty($dosen)) {
            Flash::error('Dosen not found');

            return redirect(route('dosens.index'));
        }

        return view('dosens.edit')->with('dosen', $dosen);
    }

    /**
     * Update the specified Dosen in storage.
     *
     * @param  int              $id
     * @param UpdateDosenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDosenRequest $request)
    {
        $dosen = $this->dosenRepository->findWithoutFail($id);

        if (empty($dosen)) {
            Flash::error('Dosen not found');

            return redirect(route('dosens.index'));
        }

        $dosen = $this->dosenRepository->update($request->all(), $id);

        Flash::success('Dosen updated successfully.');

        return redirect(route('dosens.index'));
    }

    /**
     * Remove the specified Dosen from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dosen = $this->dosenRepository->findWithoutFail($id);

        if (empty($dosen)) {
            Flash::error('Dosen not found');

            return redirect(route('dosens.index'));
        }

        $this->dosenRepository->delete($id);

        Flash::success('Dosen deleted successfully.');

        return redirect(route('dosens.index'));
    }
}
