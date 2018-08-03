<?php

use App\Models\Semester;
use App\Repositories\SemesterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SemesterRepositoryTest extends TestCase
{
    use MakeSemesterTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SemesterRepository
     */
    protected $semesterRepo;

    public function setUp()
    {
        parent::setUp();
        $this->semesterRepo = App::make(SemesterRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSemester()
    {
        $semester = $this->fakeSemesterData();
        $createdSemester = $this->semesterRepo->create($semester);
        $createdSemester = $createdSemester->toArray();
        $this->assertArrayHasKey('id', $createdSemester);
        $this->assertNotNull($createdSemester['id'], 'Created Semester must have id specified');
        $this->assertNotNull(Semester::find($createdSemester['id']), 'Semester with given id must be in DB');
        $this->assertModelData($semester, $createdSemester);
    }

    /**
     * @test read
     */
    public function testReadSemester()
    {
        $semester = $this->makeSemester();
        $dbSemester = $this->semesterRepo->find($semester->id);
        $dbSemester = $dbSemester->toArray();
        $this->assertModelData($semester->toArray(), $dbSemester);
    }

    /**
     * @test update
     */
    public function testUpdateSemester()
    {
        $semester = $this->makeSemester();
        $fakeSemester = $this->fakeSemesterData();
        $updatedSemester = $this->semesterRepo->update($fakeSemester, $semester->id);
        $this->assertModelData($fakeSemester, $updatedSemester->toArray());
        $dbSemester = $this->semesterRepo->find($semester->id);
        $this->assertModelData($fakeSemester, $dbSemester->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSemester()
    {
        $semester = $this->makeSemester();
        $resp = $this->semesterRepo->delete($semester->id);
        $this->assertTrue($resp);
        $this->assertNull(Semester::find($semester->id), 'Semester should not exist in DB');
    }
}
