<?php

namespace App\Repositories;

use App\Models\Study;
use InfyOm\Generator\Common\BaseRepository;

class StudyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_semester',
        'id_mahasiswa',
        'id_matakuliah',
        'nilai'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Study::class;
    }
}
