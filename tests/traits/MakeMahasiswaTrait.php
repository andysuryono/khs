<?php

use Faker\Factory as Faker;
use App\Models\Mahasiswa;
use App\Repositories\MahasiswaRepository;

trait MakeMahasiswaTrait
{
    /**
     * Create fake instance of Mahasiswa and save it in database
     *
     * @param array $mahasiswaFields
     * @return Mahasiswa
     */
    public function makeMahasiswa($mahasiswaFields = [])
    {
        /** @var MahasiswaRepository $mahasiswaRepo */
        $mahasiswaRepo = App::make(MahasiswaRepository::class);
        $theme = $this->fakeMahasiswaData($mahasiswaFields);
        return $mahasiswaRepo->create($theme);
    }

    /**
     * Get fake instance of Mahasiswa
     *
     * @param array $mahasiswaFields
     * @return Mahasiswa
     */
    public function fakeMahasiswa($mahasiswaFields = [])
    {
        return new Mahasiswa($this->fakeMahasiswaData($mahasiswaFields));
    }

    /**
     * Get fake data of Mahasiswa
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMahasiswaData($mahasiswaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'nim' => $fake->word,
            'password' => $fake->word,
            'gender' => $fake->word,
            'alamat' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $mahasiswaFields);
    }
}
