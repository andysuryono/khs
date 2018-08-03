<?php

use App\Models\Study;
use App\Repositories\StudyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StudyRepositoryTest extends TestCase
{
    use MakeStudyTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var StudyRepository
     */
    protected $studyRepo;

    public function setUp()
    {
        parent::setUp();
        $this->studyRepo = App::make(StudyRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateStudy()
    {
        $study = $this->fakeStudyData();
        $createdStudy = $this->studyRepo->create($study);
        $createdStudy = $createdStudy->toArray();
        $this->assertArrayHasKey('id', $createdStudy);
        $this->assertNotNull($createdStudy['id'], 'Created Study must have id specified');
        $this->assertNotNull(Study::find($createdStudy['id']), 'Study with given id must be in DB');
        $this->assertModelData($study, $createdStudy);
    }

    /**
     * @test read
     */
    public function testReadStudy()
    {
        $study = $this->makeStudy();
        $dbStudy = $this->studyRepo->find($study->id);
        $dbStudy = $dbStudy->toArray();
        $this->assertModelData($study->toArray(), $dbStudy);
    }

    /**
     * @test update
     */
    public function testUpdateStudy()
    {
        $study = $this->makeStudy();
        $fakeStudy = $this->fakeStudyData();
        $updatedStudy = $this->studyRepo->update($fakeStudy, $study->id);
        $this->assertModelData($fakeStudy, $updatedStudy->toArray());
        $dbStudy = $this->studyRepo->find($study->id);
        $this->assertModelData($fakeStudy, $dbStudy->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteStudy()
    {
        $study = $this->makeStudy();
        $resp = $this->studyRepo->delete($study->id);
        $this->assertTrue($resp);
        $this->assertNull(Study::find($study->id), 'Study should not exist in DB');
    }
}
