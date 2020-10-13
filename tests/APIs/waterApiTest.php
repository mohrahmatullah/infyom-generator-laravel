<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakewaterTrait;
use Tests\ApiTestTrait;

class waterApiTest extends TestCase
{
    use MakewaterTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_water()
    {
        $water = $this->fakewaterData();
        $this->response = $this->json('POST', '/api/waters', $water);

        $this->assertApiResponse($water);
    }

    /**
     * @test
     */
    public function test_read_water()
    {
        $water = $this->makewater();
        $this->response = $this->json('GET', '/api/waters/'.$water->id);

        $this->assertApiResponse($water->toArray());
    }

    /**
     * @test
     */
    public function test_update_water()
    {
        $water = $this->makewater();
        $editedwater = $this->fakewaterData();

        $this->response = $this->json('PUT', '/api/waters/'.$water->id, $editedwater);

        $this->assertApiResponse($editedwater);
    }

    /**
     * @test
     */
    public function test_delete_water()
    {
        $water = $this->makewater();
        $this->response = $this->json('DELETE', '/api/waters/'.$water->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/waters/'.$water->id);

        $this->response->assertStatus(404);
    }
}
