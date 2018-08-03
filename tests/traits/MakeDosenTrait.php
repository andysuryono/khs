<?php

use Faker\Factory as Faker;
use App\Models\Dosen;
use App\Repositories\DosenRepository;

trait MakeDosenTrait
{
    /**
     * Create fake instance of Dosen and save it in database
     *
     * @param array $dosenFields
     * @return Dosen
     */
    public function makeDosen($dosenFields = [])
    {
        /** @var DosenRepository $dosenRepo */
        $dosenRepo = App::make(DosenRepository::class);
        $theme = $this->fakeDosenData($dosenFields);
        return $dosenRepo->create($theme);
    }

    /**
     * Get fake instance of Dosen
     *
     * @param array $dosenFields
     * @return Dosen
     */
    public function fakeDosen($dosenFields = [])
    {
        return new Dosen($this->fakeDosenData($dosenFields));
    }

    /**
     * Get fake data of Dosen
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDosenData($dosenFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'nip' => $fake->word,
            'password' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $dosenFields);
    }
}
