<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SemesterApiTest extends TestCase
{
    use MakeSemesterTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSemester()
    {
        $semester = $this->fakeSemesterData();
        $this->json('POST', '/api/v1/semesters', $semester);

        $this->assertApiResponse($semester);
    }

    /**
     * @test
     */
    public function testReadSemester()
    {
        $semester = $this->makeSemester();
        $this->json('GET', '/api/v1/semesters/'.$semester->id);

        $this->assertApiResponse($semester->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSemester()
    {
        $semester = $this->makeSemester();
        $editedSemester = $this->fakeSemesterData();

        $this->json('PUT', '/api/v1/semesters/'.$semester->id, $editedSemester);

        $this->assertApiResponse($editedSemester);
    }

    /**
     * @test
     */
    public function testDeleteSemester()
    {
        $semester = $this->makeSemester();
        $this->json('DELETE', '/api/v1/semesters/'.$semester->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/semesters/'.$semester->id);

        $this->assertResponseStatus(404);
    }
}
