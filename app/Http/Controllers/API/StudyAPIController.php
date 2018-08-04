<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStudyAPIRequest;
use App\Http\Requests\API\UpdateStudyAPIRequest;
use App\Models\Study;
use App\Models\Mahasiswa;
use App\Models\Semester;
use App\Repositories\StudyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use PDF;

/**
 * Class StudyController
 * @package App\Http\Controllers\API
 */

class StudyAPIController extends AppBaseController
{
    /** @var  StudyRepository */
    private $studyRepository;

    public function __construct(StudyRepository $studyRepo)
    {
        $this->studyRepository = $studyRepo;
    }

    /**
     * Display a listing of the Study.
     * GET|HEAD /studies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $studies = Study::with('mahasiswa');                
        if($id_mahasiswa = $request->get('id_mahasiswa')){
            $studies->where('id_mahasiswa',$id_mahasiswa);
            $mahasiswa = Mahasiswa::where('id',$id_mahasiswa)->first();
        }

        if($id_semester = $request->get('id_semester')){
            $studies->where('id_semester',$id_semester);
        }

        if($id_matakuliah = $request->get('id_matakuliah')){
            $studies->where('id_matakuliah',$id_matakuliah);
        }

        $studies = $studies->get();
        
        $jumlah_sks = 0;
        $jumlah_mutu = 0;
        if($studies->count() > 0){
            foreach ($studies as $key => $value) {
                $jumlah_sks = $jumlah_sks + $value->matakuliah->sks;
                $jumlah_mutu = $jumlah_mutu + $value->nilai;
                $studies[$key] = [
                    'id' => $value->id,
                    'id_semester' => $value->id_semester,
                    'id_matakuliah' => $value->id_matakuliah,
                    'id_mahasiswa' => $value->id_mahasiswa,
                    'mahasiswa' => $value->mahasiswa->nama,
                    'nim' => $value->mahasiswa->nim,
                    'matakuliah' => $value->matakuliah->nama,
                    'dosen' => $value->matakuliah->dosen->nama,
                    'kode' => $value->matakuliah->kode,
                    'semester' => $value->semester->nama,
                    'sks' => $value->matakuliah->sks,
                    'nilai' => $value->nilai,
                 ];
            }
        $sisa = 20 - $jumlah_sks;
            if($sisa < 0){
                return $res = [
                    'success' => false,
                    'message' => "Anda Melebihi batas minimum SKS",
                    ];
              }
         $ipk = $jumlah_mutu / $jumlah_sks;
        return $res = [
            'success' => true,
            'data' => $studies,
            'nama' => $mahasiswa,
            'jumlah_sks' => $jumlah_sks,
            'sisa_sks' => $sisa,
            'jumlah_mutu' => $jumlah_mutu,
            'ipk' => $ipk,
            'message' => "Data berhasil di ambil",
            ];
        }else{
            return $res = [
            'success' => false,
            'data' => $studies,
            'message' => "Data tidak ditemukan",
            ];
        }

        

       
    }

     public function cetak(Request $request)
    {
        $studies = Study::with('mahasiswa');        
        if($id_mahasiswa = $request->get('id_mahasiswa')){
            $studies->where('id_mahasiswa',$id_mahasiswa);
            $mahasiswa = Mahasiswa::where('id',$id_mahasiswa)->first();
        }

        if($id_semester = $request->get('id_semester')){
            $studies->where('id_semester',$id_semester);
            $semester = Semester::where('id',$id_semester)->first();
        }

        if($id_matakuliah = $request->get('id_matakuliah')){
            $studies->where('id_matakuliah',$id_matakuliah);
        }

        $studies = $studies->get();
        
        $jumlah_sks = 0;
        $jumlah_mutu = 0;
        $nama_mahasiswa = "";

        if($studies->count() > 0){
            foreach ($studies as $key => $value) {
                $jumlah_sks = $jumlah_sks + $value->matakuliah->sks;
                $jumlah_mutu = $jumlah_mutu + $value->nilai;
                // $nama_mahasiswa = $value->mahasiswa->nama;
                $studies[$key] = [
                    'id' => $value->id,
                    'id_semester' => $value->id_semester,
                    'id_matakuliah' => $value->id_matakuliah,
                    'id_mahasiswa' => $value->id_mahasiswa,
                    'mahasiswa' => $value->mahasiswa->nama,
                    'nim' => $value->mahasiswa->nim,
                    'matakuliah' => $value->matakuliah->nama,
                    'dosen' => $value->matakuliah->dosen->nama,
                    'kode' => $value->matakuliah->kode,
                    'semester' => $value->semester->nama,
                    'sks' => $value->matakuliah->sks,
                    'nilai' => $value->nilai,
                 ];
            }
           $sisa = 20 - $jumlah_sks;
            if($sisa < 0){
                return $res = [
                    'success' => false,
                    'message' => "Anda Melebihi batas minimum SKS",
                    ];
              }
            $ipk = $jumlah_mutu / $jumlah_sks;

          $data = [
            'studies' => $studies,
            'nama' => $mahasiswa,
            'jumlah_sks' => $jumlah_sks,
            'sisa_sks' => $sisa,
            'jumlah_mutu' => $jumlah_mutu,
            'ipk' => $ipk,
            'message' => "Data berhasil di ambil",
            ];        
             // return $this->render('report.hasil_study',array('data' => $mahasiswa));
        $pdf = \PDF::loadView('report.hasil_study', array('studies' => $studies,'mahasiswa' => $mahasiswa,'semester' => $semester,'data' => $data) );
            return $pdf->stream('hasil_study.pdf');
        }else{
            return $res = [
            'success' => false,
            'data' => $studies,
            'message' => "Data tidak ditemukan",
            ];
        }  
    }

    public function cetakSemua(Request $request)
    {
        $studies = Study::with('mahasiswa');        
        if($id_mahasiswa = $request->get('id_mahasiswa')){
            $studies->where('id_mahasiswa',$id_mahasiswa);
            $mahasiswa = Mahasiswa::where('id',$id_mahasiswa)->first();
        }

        if($id_matakuliah = $request->get('id_matakuliah')){
            $studies->where('id_matakuliah',$id_matakuliah);
        }

        $studies = $studies->get();
        
        $jumlah_sks = 0;
        $jumlah_mutu = 0;
        $nama_mahasiswa = "";

        if($studies->count() > 0){
            foreach ($studies as $key => $value) {
                $jumlah_sks = $jumlah_sks + $value->matakuliah->sks;
                $jumlah_mutu = $jumlah_mutu + $value->nilai;
                // $nama_mahasiswa = $value->mahasiswa->nama;
                $studies[$key] = [
                    'id' => $value->id,
                    'id_semester' => $value->id_semester,
                    'id_matakuliah' => $value->id_matakuliah,
                    'id_mahasiswa' => $value->id_mahasiswa,
                    'mahasiswa' => $value->mahasiswa->nama,
                    'nim' => $value->mahasiswa->nim,
                    'matakuliah' => $value->matakuliah->nama,
                    'dosen' => $value->matakuliah->dosen->nama,
                    'kode' => $value->matakuliah->kode,
                    'semester' => $value->semester->nama,
                    'sks' => $value->matakuliah->sks,
                    'nilai' => $value->nilai,
                 ];
            }
           $sisa = 20 - $jumlah_sks;
            if($sisa < 0){
                return $res = [
                    'success' => false,
                    'message' => "Anda Melebihi batas minimum SKS",
                    ];
              }
            $ipk = $jumlah_mutu / $jumlah_sks;

          $data = [
            'studies' => $studies,
            'nama' => $mahasiswa,
            'jumlah_sks' => $jumlah_sks,
            'sisa_sks' => $sisa,
            'jumlah_mutu' => $jumlah_mutu,
            'ipk' => $ipk,
            'message' => "Data berhasil di ambil",
            ];        
             // return $this->render('report.hasil_study',array('data' => $mahasiswa));
        $pdf = \PDF::loadView('report.hasil_study_semua', array('studies' => $studies,'mahasiswa' => $mahasiswa,'data' => $data) );
            return $pdf->stream('hasil_study.pdf');
        }else{
            return $res = [
            'success' => false,
            'data' => $studies,
            'message' => "Data tidak ditemukan",
            ];
        }  
    }

    /**
     * Store a newly created Study in storage.
     * POST /studies
     *
     * @param CreateStudyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStudyAPIRequest $request)
    {
        $id_semester = $request->input('id_semester');
        $id_mahasiswa = $request->input('id_mahasiswa');
        $id_matakuliah = $request->input('id_matakuliah');
        $check = Study::where('id_mahasiswa',$id_mahasiswa)
                        ->where('id_matakuliah',$id_matakuliah)->get();
        if($check->count() > 0){
            return $res = [
            'success' => false,
            'message' => "Ada sudah pernah mengambil matakuliah ini",
            ];
        }else{
            $input = $request->all();
            $studies = new Study();
            $studies->fill($input);
            $studies->save();
            return $res = [
            'success' => true,
            'message' => "Data Berhasil Ditambahkan",
            ];
        }
    }


    /**
     * Display the specified Study.
     * GET|HEAD /studies/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Study $study */
        $study = $this->studyRepository->findWithoutFail($id);

        if (empty($study)) {
            return $this->sendError('Study not found');
        }

        return $this->sendResponse($study->toArray(), 'Study retrieved successfully');
    }

    /**
     * Update the specified Study in storage.
     * PUT/PATCH /studies/{id}
     *
     * @param  int $id
     * @param UpdateStudyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudyAPIRequest $request)
    {
        $input = $request->all();

        /** @var Study $study */
        $study = $this->studyRepository->findWithoutFail($id);

        if (empty($study)) {
            return $this->sendError('Study not found');
        }

        $study = $this->studyRepository->update($input, $id);

        return $this->sendResponse($study->toArray(), 'Study updated successfully');
    }

    /**
     * Remove the specified Study from storage.
     * DELETE /studies/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Study $study */
        $study = $this->studyRepository->findWithoutFail($id);

        if (empty($study)) {
            return $this->sendError('Study not found');
        }

        $study->delete();

        return $this->sendResponse($id, 'Study deleted successfully');
    }
}
