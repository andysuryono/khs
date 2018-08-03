<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DosenApiTest extends TestCase
{
    use MakeDosenTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDosen()
    {
        $dosen = $this->fakeDosenData();
        $this->json('POST', '/api/v1/dosens', $dosen);

        $this->assertApiResponse($dosen);
    }

    /**
     * @test
     */
    public function testReadDosen()
    {
        $dosen = $this->makeDosen();
        $this->json('GET', '/api/v1/dosens/'.$dosen->id);

        $this->assertApiResponse($dosen->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDosen()
    {
        $dosen = $this->makeDosen();
        $editedDosen = $this->fakeDosenData();

        $this->json('PUT', '/api/v1/dosens/'.$dosen->id, $editedDosen);

        $this->assertApiResponse($editedDosen);
    }

    /**
     * @test
     */
    public function testDeleteDosen()
    {
        $dosen = $this->makeDosen();
        $this->json('DELETE', '/api/v1/dosens/'.$dosen->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/dosens/'.$dosen->id);

        $this->assertResponseStatus(404);
    }
}
