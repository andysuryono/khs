<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Study
 * @package App\Models
 * @version August 3, 2018, 6:15 am UTC
 */
class Study extends Model
{
    use SoftDeletes;

    public $table = 'studies';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_semester',
        'id_mahasiswa',
        'id_matakuliah',
        'nilai'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_semester' => 'integer',
        'id_mahasiswa' => 'integer',
        'id_matakuliah' => 'integer',
        'nilai' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_semester' => 'required',
        'id_mahasiswa' => 'required',
        'id_matakuliah' => 'required',
        'nilai' => 'required'
    ];

    public function matakuliah()
    {
        return $this->belongsTo('App\Models\MataKuliah','id_matakuliah');
    }

    public function semester()
    {
        return $this->belongsTo('App\Models\Semester','id_semester');
    }public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa','id_mahasiswa');
    }
}
