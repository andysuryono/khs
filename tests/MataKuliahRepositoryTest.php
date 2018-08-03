<?php

use App\Models\MataKuliah;
use App\Repositories\MataKuliahRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MataKuliahRepositoryTest extends TestCase
{
    use MakeMataKuliahTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MataKuliahRepository
     */
    protected $mataKuliahRepo;

    public function setUp()
    {
        parent::setUp();
        $this->mataKuliahRepo = App::make(MataKuliahRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMataKuliah()
    {
        $mataKuliah = $this->fakeMataKuliahData();
        $createdMataKuliah = $this->mataKuliahRepo->create($mataKuliah);
        $createdMataKuliah = $createdMataKuliah->toArray();
        $this->assertArrayHasKey('id', $createdMataKuliah);
        $this->assertNotNull($createdMataKuliah['id'], 'Created MataKuliah must have id specified');
        $this->assertNotNull(MataKuliah::find($createdMataKuliah['id']), 'MataKuliah with given id must be in DB');
        $this->assertModelData($mataKuliah, $createdMataKuliah);
    }

    /**
     * @test read
     */
    public function testReadMataKuliah()
    {
        $mataKuliah = $this->makeMataKuliah();
        $dbMataKuliah = $this->mataKuliahRepo->find($mataKuliah->id);
        $dbMataKuliah = $dbMataKuliah->toArray();
        $this->assertModelData($mataKuliah->toArray(), $dbMataKuliah);
    }

    /**
     * @test update
     */
    public function testUpdateMataKuliah()
    {
        $mataKuliah = $this->makeMataKuliah();
        $fakeMataKuliah = $this->fakeMataKuliahData();
        $updatedMataKuliah = $this->mataKuliahRepo->update($fakeMataKuliah, $mataKuliah->id);
        $this->assertModelData($fakeMataKuliah, $updatedMataKuliah->toArray());
        $dbMataKuliah = $this->mataKuliahRepo->find($mataKuliah->id);
        $this->assertModelData($fakeMataKuliah, $dbMataKuliah->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMataKuliah()
    {
        $mataKuliah = $this->makeMataKuliah();
        $resp = $this->mataKuliahRepo->delete($mataKuliah->id);
        $this->assertTrue($resp);
        $this->assertNull(MataKuliah::find($mataKuliah->id), 'MataKuliah should not exist in DB');
    }
}
