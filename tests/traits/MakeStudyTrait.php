<?php

use Faker\Factory as Faker;
use App\Models\Study;
use App\Repositories\StudyRepository;

trait MakeStudyTrait
{
    /**
     * Create fake instance of Study and save it in database
     *
     * @param array $studyFields
     * @return Study
     */
    public function makeStudy($studyFields = [])
    {
        /** @var StudyRepository $studyRepo */
        $studyRepo = App::make(StudyRepository::class);
        $theme = $this->fakeStudyData($studyFields);
        return $studyRepo->create($theme);
    }

    /**
     * Get fake instance of Study
     *
     * @param array $studyFields
     * @return Study
     */
    public function fakeStudy($studyFields = [])
    {
        return new Study($this->fakeStudyData($studyFields));
    }

    /**
     * Get fake data of Study
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStudyData($studyFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_semester' => $fake->randomDigitNotNull,
            'id_mahasiswa' => $fake->randomDigitNotNull,
            'id_matakuliah' => $fake->randomDigitNotNull,
            'nilai' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $studyFields);
    }
}
