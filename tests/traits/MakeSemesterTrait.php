<?php

use Faker\Factory as Faker;
use App\Models\Semester;
use App\Repositories\SemesterRepository;

trait MakeSemesterTrait
{
    /**
     * Create fake instance of Semester and save it in database
     *
     * @param array $semesterFields
     * @return Semester
     */
    public function makeSemester($semesterFields = [])
    {
        /** @var SemesterRepository $semesterRepo */
        $semesterRepo = App::make(SemesterRepository::class);
        $theme = $this->fakeSemesterData($semesterFields);
        return $semesterRepo->create($theme);
    }

    /**
     * Get fake instance of Semester
     *
     * @param array $semesterFields
     * @return Semester
     */
    public function fakeSemester($semesterFields = [])
    {
        return new Semester($this->fakeSemesterData($semesterFields));
    }

    /**
     * Get fake data of Semester
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSemesterData($semesterFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $semesterFields);
    }
}
