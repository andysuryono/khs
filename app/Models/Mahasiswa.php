<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Mahasiswa
 * @package App\Models
 * @version August 3, 2018, 6:13 am UTC
 */
class Mahasiswa extends Model
{
    use SoftDeletes;

    public $table = 'mahasiswas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'nim',
        'password',
        'gender',
        'alamat',
        'id_jurusan',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'nim' => 'string',
        'password' => 'string',
        'gender' => 'string',
        'alamat' => 'string',
        'id_jurusan' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'nim' => 'required',
        'password' => 'required',
        'gender' => 'required',
        'alamat' => 'required',
        'id_jurusan' => 'required',
    ];

    public function jurusan()
    {
        return $this->belongsTo('App\Models\Jurusan','id_jurusan');
    }

    
}
