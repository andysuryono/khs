<?php

namespace App\Repositories;

use App\Models\Mahasiswa;
use InfyOm\Generator\Common\BaseRepository;

class MahasiswaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'nim',
        'password',
        'gender',
        'alamat'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Mahasiswa::class;
    }
}
