<?php

use App\Models\Dosen;
use App\Repositories\DosenRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DosenRepositoryTest extends TestCase
{
    use MakeDosenTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DosenRepository
     */
    protected $dosenRepo;

    public function setUp()
    {
        parent::setUp();
        $this->dosenRepo = App::make(DosenRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDosen()
    {
        $dosen = $this->fakeDosenData();
        $createdDosen = $this->dosenRepo->create($dosen);
        $createdDosen = $createdDosen->toArray();
        $this->assertArrayHasKey('id', $createdDosen);
        $this->assertNotNull($createdDosen['id'], 'Created Dosen must have id specified');
        $this->assertNotNull(Dosen::find($createdDosen['id']), 'Dosen with given id must be in DB');
        $this->assertModelData($dosen, $createdDosen);
    }

    /**
     * @test read
     */
    public function testReadDosen()
    {
        $dosen = $this->makeDosen();
        $dbDosen = $this->dosenRepo->find($dosen->id);
        $dbDosen = $dbDosen->toArray();
        $this->assertModelData($dosen->toArray(), $dbDosen);
    }

    /**
     * @test update
     */
    public function testUpdateDosen()
    {
        $dosen = $this->makeDosen();
        $fakeDosen = $this->fakeDosenData();
        $updatedDosen = $this->dosenRepo->update($fakeDosen, $dosen->id);
        $this->assertModelData($fakeDosen, $updatedDosen->toArray());
        $dbDosen = $this->dosenRepo->find($dosen->id);
        $this->assertModelData($fakeDosen, $dbDosen->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDosen()
    {
        $dosen = $this->makeDosen();
        $resp = $this->dosenRepo->delete($dosen->id);
        $this->assertTrue($resp);
        $this->assertNull(Dosen::find($dosen->id), 'Dosen should not exist in DB');
    }
}
