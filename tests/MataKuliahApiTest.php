<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MataKuliahApiTest extends TestCase
{
    use MakeMataKuliahTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMataKuliah()
    {
        $mataKuliah = $this->fakeMataKuliahData();
        $this->json('POST', '/api/v1/mataKuliahs', $mataKuliah);

        $this->assertApiResponse($mataKuliah);
    }

    /**
     * @test
     */
    public function testReadMataKuliah()
    {
        $mataKuliah = $this->makeMataKuliah();
        $this->json('GET', '/api/v1/mataKuliahs/'.$mataKuliah->id);

        $this->assertApiResponse($mataKuliah->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMataKuliah()
    {
        $mataKuliah = $this->makeMataKuliah();
        $editedMataKuliah = $this->fakeMataKuliahData();

        $this->json('PUT', '/api/v1/mataKuliahs/'.$mataKuliah->id, $editedMataKuliah);

        $this->assertApiResponse($editedMataKuliah);
    }

    /**
     * @test
     */
    public function testDeleteMataKuliah()
    {
        $mataKuliah = $this->makeMataKuliah();
        $this->json('DELETE', '/api/v1/mataKuliahs/'.$mataKuliah->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/mataKuliahs/'.$mataKuliah->id);

        $this->assertResponseStatus(404);
    }
}
