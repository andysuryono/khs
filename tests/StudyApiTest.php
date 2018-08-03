<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StudyApiTest extends TestCase
{
    use MakeStudyTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateStudy()
    {
        $study = $this->fakeStudyData();
        $this->json('POST', '/api/v1/studies', $study);

        $this->assertApiResponse($study);
    }

    /**
     * @test
     */
    public function testReadStudy()
    {
        $study = $this->makeStudy();
        $this->json('GET', '/api/v1/studies/'.$study->id);

        $this->assertApiResponse($study->toArray());
    }

    /**
     * @test
     */
    public function testUpdateStudy()
    {
        $study = $this->makeStudy();
        $editedStudy = $this->fakeStudyData();

        $this->json('PUT', '/api/v1/studies/'.$study->id, $editedStudy);

        $this->assertApiResponse($editedStudy);
    }

    /**
     * @test
     */
    public function testDeleteStudy()
    {
        $study = $this->makeStudy();
        $this->json('DELETE', '/api/v1/studies/'.$study->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/studies/'.$study->id);

        $this->assertResponseStatus(404);
    }
}
