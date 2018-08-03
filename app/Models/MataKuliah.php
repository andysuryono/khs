<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MataKuliah
 * @package App\Models
 * @version August 3, 2018, 6:11 am UTC
 */
class MataKuliah extends Model
{
    use SoftDeletes;

    public $table = 'mata_kuliahs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'kode',
        'nama',
        'sks',
        'id_dosen',
        'id_semester',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'kode' => 'string',
        'nama' => 'string',
        'sks' => 'integer',
        'id_dosen' => 'integer',
        'id_semester' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode' => 'required',
        'nama' => 'required',
        'sks' => 'required',
        'id_dosen' => 'required',
        'id_semester' => 'required',
    ];


    public function dosen()
    {
        return $this->belongsTo('App\Models\Dosen','id_dosen');
    }
    
}
