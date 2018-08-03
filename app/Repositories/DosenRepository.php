<?php

namespace App\Repositories;

use App\Models\Dosen;
use InfyOm\Generator\Common\BaseRepository;

class DosenRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'nip',
        'password'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Dosen::class;
    }
}
