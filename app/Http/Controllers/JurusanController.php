<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJurusanRequest;
use App\Http\Requests\UpdateJurusanRequest;
use App\Repositories\JurusanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class JurusanController extends AppBaseController
{
    /** @var  JurusanRepository */
    private $jurusanRepository;

    public function __construct(JurusanRepository $jurusanRepo)
    {
        $this->jurusanRepository = $jurusanRepo;
    }

    /**
     * Display a listing of the Jurusan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jurusanRepository->pushCriteria(new RequestCriteria($request));
        $jurusans = $this->jurusanRepository->all();

        return view('jurusans.index')
            ->with('jurusans', $jurusans);
    }

    /**
     * Show the form for creating a new Jurusan.
     *
     * @return Response
     */
    public function create()
    {
        return view('jurusans.create');
    }

    /**
     * Store a newly created Jurusan in storage.
     *
     * @param CreateJurusanRequest $request
     *
     * @return Response
     */
    public function store(CreateJurusanRequest $request)
    {
        $input = $request->all();

        $jurusan = $this->jurusanRepository->create($input);

        Flash::success('Jurusan saved successfully.');

        return redirect(route('jurusans.index'));
    }

    /**
     * Display the specified Jurusan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jurusan = $this->jurusanRepository->findWithoutFail($id);

        if (empty($jurusan)) {
            Flash::error('Jurusan not found');

            return redirect(route('jurusans.index'));
        }

        return view('jurusans.show')->with('jurusan', $jurusan);
    }

    /**
     * Show the form for editing the specified Jurusan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jurusan = $this->jurusanRepository->findWithoutFail($id);

        if (empty($jurusan)) {
            Flash::error('Jurusan not found');

            return redirect(route('jurusans.index'));
        }

        return view('jurusans.edit')->with('jurusan', $jurusan);
    }

    /**
     * Update the specified Jurusan in storage.
     *
     * @param  int              $id
     * @param UpdateJurusanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJurusanRequest $request)
    {
        $jurusan = $this->jurusanRepository->findWithoutFail($id);

        if (empty($jurusan)) {
            Flash::error('Jurusan not found');

            return redirect(route('jurusans.index'));
        }

        $jurusan = $this->jurusanRepository->update($request->all(), $id);

        Flash::success('Jurusan updated successfully.');

        return redirect(route('jurusans.index'));
    }

    /**
     * Remove the specified Jurusan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jurusan = $this->jurusanRepository->findWithoutFail($id);

        if (empty($jurusan)) {
            Flash::error('Jurusan not found');

            return redirect(route('jurusans.index'));
        }

        $this->jurusanRepository->delete($id);

        Flash::success('Jurusan deleted successfully.');

        return redirect(route('jurusans.index'));
    }
}
