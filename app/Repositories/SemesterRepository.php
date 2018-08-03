<?php

namespace App\Repositories;

use App\Models\Semester;
use InfyOm\Generator\Common\BaseRepository;

class SemesterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Semester::class;
    }
}
