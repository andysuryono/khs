<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMataKuliahAPIRequest;
use App\Http\Requests\API\UpdateMataKuliahAPIRequest;
use App\Models\MataKuliah;
use App\Repositories\MataKuliahRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MataKuliahController
 * @package App\Http\Controllers\API
 */

class MataKuliahAPIController extends AppBaseController
{
    /** @var  MataKuliahRepository */
    private $mataKuliahRepository;

    public function __construct(MataKuliahRepository $mataKuliahRepo)
    {
        $this->mataKuliahRepository = $mataKuliahRepo;
    }

    /**
     * Display a listing of the MataKuliah.
     * GET|HEAD /mataKuliahs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $mataKuliahs = MataKuliah::with('dosen');
        if($id_semester = $request->get('id_semester')){
            $mataKuliahs->where('id_semester',$id_semester);
        }

        if($id_dosen = $request->get('id_dosen')){
            $mataKuliahs->where('id_dosen',$id_dosen);
        }
        return $this->sendResponse($mataKuliahs->get()->toArray(), 'Mata Kuliahs retrieved successfully');
    }

    /**
     * Store a newly created MataKuliah in storage.
     * POST /mataKuliahs
     *
     * @param CreateMataKuliahAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMataKuliahAPIRequest $request)
    {
        $input = $request->all();

        $mataKuliahs = $this->mataKuliahRepository->create($input);

        return $this->sendResponse($mataKuliahs->toArray(), 'Mata Kuliah saved successfully');
    }

    /**
     * Display the specified MataKuliah.
     * GET|HEAD /mataKuliahs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MataKuliah $mataKuliah */
        $mataKuliah = $this->mataKuliahRepository->findWithoutFail($id);

        if (empty($mataKuliah)) {
            return $this->sendError('Mata Kuliah not found');
        }

        return $this->sendResponse($mataKuliah->toArray(), 'Mata Kuliah retrieved successfully');
    }

    /**
     * Update the specified MataKuliah in storage.
     * PUT/PATCH /mataKuliahs/{id}
     *
     * @param  int $id
     * @param UpdateMataKuliahAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMataKuliahAPIRequest $request)
    {
        $input = $request->all();

        /** @var MataKuliah $mataKuliah */
        $mataKuliah = $this->mataKuliahRepository->findWithoutFail($id);

        if (empty($mataKuliah)) {
            return $this->sendError('Mata Kuliah not found');
        }

        $mataKuliah = $this->mataKuliahRepository->update($input, $id);

        return $this->sendResponse($mataKuliah->toArray(), 'MataKuliah updated successfully');
    }

    /**
     * Remove the specified MataKuliah from storage.
     * DELETE /mataKuliahs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MataKuliah $mataKuliah */
        $mataKuliah = $this->mataKuliahRepository->findWithoutFail($id);

        if (empty($mataKuliah)) {
            return $this->sendError('Mata Kuliah not found');
        }

        $mataKuliah->delete();

        return $this->sendResponse($id, 'Mata Kuliah deleted successfully');
    }
}
