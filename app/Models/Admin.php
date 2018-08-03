<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Admin
 * @package App\Models
 * @version August 3, 2018, 6:19 am UTC
 */
class Admin extends Model
{
    use SoftDeletes;

    public $table = 'admins';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'password' => 'required'
    ];

    
}
