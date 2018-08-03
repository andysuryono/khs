<?php

use Faker\Factory as Faker;
use App\Models\MataKuliah;
use App\Repositories\MataKuliahRepository;

trait MakeMataKuliahTrait
{
    /**
     * Create fake instance of MataKuliah and save it in database
     *
     * @param array $mataKuliahFields
     * @return MataKuliah
     */
    public function makeMataKuliah($mataKuliahFields = [])
    {
        /** @var MataKuliahRepository $mataKuliahRepo */
        $mataKuliahRepo = App::make(MataKuliahRepository::class);
        $theme = $this->fakeMataKuliahData($mataKuliahFields);
        return $mataKuliahRepo->create($theme);
    }

    /**
     * Get fake instance of MataKuliah
     *
     * @param array $mataKuliahFields
     * @return MataKuliah
     */
    public function fakeMataKuliah($mataKuliahFields = [])
    {
        return new MataKuliah($this->fakeMataKuliahData($mataKuliahFields));
    }

    /**
     * Get fake data of MataKuliah
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMataKuliahData($mataKuliahFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'kode' => $fake->word,
            'nama' => $fake->word,
            'sks' => $fake->randomDigitNotNull,
            'id_dosen' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $mataKuliahFields);
    }
}
