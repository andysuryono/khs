<?php

namespace App\Http\Controllers\API;

use App\Models\Admin;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class JawabanController
 * @package App\Http\Controllers\API
 */

class LoginController extends AppBaseController
{

  public function login(Request $request)
  {
    $mahasiswaCheck = Mahasiswa::where('nim', $request->username)->first();
    $dosenCheck = Dosen::where('nip', $request->username)->first();
    $adminCheck = Admin::where('nama', $request->username)->first();
         if($mahasiswaCheck)
             {
                $passwordCheck = Mahasiswa::where('nim', $request->username)
                                ->where('password',$request->password)
                                ->first();
                      if($passwordCheck)
                      {
                        return response()->json([
                          'status' => true,
                          'message' => "Login Berhasil",
                          'role' => "mahasiswa",
                          'mahasiswa' => $mahasiswaCheck
                        ]);
                      }else{
                        return response()->json([
                          'message' => "Password Salah",
                        ]);
                      }
        }else if ($dosenCheck) {
            $passwordCheck = Dosen::where('nip', $request->username)
                                ->where('password',$request->password)
                                ->first();
                      if($passwordCheck)
                      {
                        return response()->json([
                          'status' => true,
                           'message' => "Login Berhasil",
                          'role' => "dosen",
                          'dosen' => $dosenCheck
                        ]);
                      }else{
                        return response()->json([
                          'message' => "Password Salah",
                        ]);
                      }
        }elseif ($adminCheck) {
          $passwordCheck = Admin::where('nama', $request->username)
                                ->where('password',$request->password)
                                ->first();
                      if($passwordCheck)
                      {
                        return response()->json([
                          'status' => true,
                          'message' => "Login Berhasil",
                          'role' => "admin",
                          'admin' => $adminCheck
                        ]);
                      }else{
                        return response()->json([
                          'message' => "Password Salah",
                        ]);
                      }
        }else{
            return response()->json([
              'status' => false, 
              'message' => "Username Tidak Ditemukan",
            ]);
        }

  if ($request->expectsJson()) {
    return response()->json($errors, 422);
  }          
}


}
