<?php

namespace App\Repositories;

use App\Models\MataKuliah;
use InfyOm\Generator\Common\BaseRepository;

class MataKuliahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'nama',
        'sks',
        'id_dosen'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MataKuliah::class;
    }
}
