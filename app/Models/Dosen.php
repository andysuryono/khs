<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Dosen
 * @package App\Models
 * @version August 3, 2018, 6:09 am UTC
 */
class Dosen extends Model
{
    use SoftDeletes;

    public $table = 'dosens';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'nip',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'nip' => 'string',
        'password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'nip' => 'required',
        'password' => 'required'
    ];

    
}
