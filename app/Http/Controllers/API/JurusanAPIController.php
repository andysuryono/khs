<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJurusanAPIRequest;
use App\Http\Requests\API\UpdateJurusanAPIRequest;
use App\Models\Jurusan;
use App\Repositories\JurusanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class JurusanController
 * @package App\Http\Controllers\API
 */

class JurusanAPIController extends AppBaseController
{
    /** @var  JurusanRepository */
    private $jurusanRepository;

    public function __construct(JurusanRepository $jurusanRepo)
    {
        $this->jurusanRepository = $jurusanRepo;
    }

    /**
     * Display a listing of the Jurusan.
     * GET|HEAD /jurusans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jurusanRepository->pushCriteria(new RequestCriteria($request));
        $this->jurusanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $jurusans = $this->jurusanRepository->all();

        return $this->sendResponse($jurusans->toArray(), 'Jurusans retrieved successfully');
    }

    /**
     * Store a newly created Jurusan in storage.
     * POST /jurusans
     *
     * @param CreateJurusanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateJurusanAPIRequest $request)
    {
        $input = $request->all();

        $jurusans = $this->jurusanRepository->create($input);

        return $this->sendResponse($jurusans->toArray(), 'Jurusan saved successfully');
    }

    /**
     * Display the specified Jurusan.
     * GET|HEAD /jurusans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Jurusan $jurusan */
        $jurusan = $this->jurusanRepository->findWithoutFail($id);

        if (empty($jurusan)) {
            return $this->sendError('Jurusan not found');
        }

        return $this->sendResponse($jurusan->toArray(), 'Jurusan retrieved successfully');
    }

    /**
     * Update the specified Jurusan in storage.
     * PUT/PATCH /jurusans/{id}
     *
     * @param  int $id
     * @param UpdateJurusanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJurusanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Jurusan $jurusan */
        $jurusan = $this->jurusanRepository->findWithoutFail($id);

        if (empty($jurusan)) {
            return $this->sendError('Jurusan not found');
        }

        $jurusan = $this->jurusanRepository->update($input, $id);

        return $this->sendResponse($jurusan->toArray(), 'Jurusan updated successfully');
    }

    /**
     * Remove the specified Jurusan from storage.
     * DELETE /jurusans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Jurusan $jurusan */
        $jurusan = $this->jurusanRepository->findWithoutFail($id);

        if (empty($jurusan)) {
            return $this->sendError('Jurusan not found');
        }

        $jurusan->delete();

        return $this->sendResponse($id, 'Jurusan deleted successfully');
    }
}
