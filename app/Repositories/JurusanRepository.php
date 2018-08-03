<?php

namespace App\Repositories;

use App\Models\Jurusan;
use InfyOm\Generator\Common\BaseRepository;

class JurusanRepository extends BaseRepository
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
        return Jurusan::class;
    }
}
