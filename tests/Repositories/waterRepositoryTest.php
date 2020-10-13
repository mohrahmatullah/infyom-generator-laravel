<?php namespace Tests\Repositories;

use App\Models\water;
use App\Repositories\waterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakewaterTrait;
use Tests\ApiTestTrait;

class waterRepositoryTest extends TestCase
{
    use MakewaterTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var waterRepository
     */
    protected $waterRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->waterRepo = \App::make(waterRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_water()
    {
        $water = $this->fakewaterData();
        $createdwater = $this->waterRepo->create($water);
        $createdwater = $createdwater->toArray();
        $this->assertArrayHasKey('id', $createdwater);
        $this->assertNotNull($createdwater['id'], 'Created water must have id specified');
        $this->assertNotNull(water::find($createdwater['id']), 'water with given id must be in DB');
        $this->assertModelData($water, $createdwater);
    }

    /**
     * @test read
     */
    public function test_read_water()
    {
        $water = $this->makewater();
        $dbwater = $this->waterRepo->find($water->id);
        $dbwater = $dbwater->toArray();
        $this->assertModelData($water->toArray(), $dbwater);
    }

    /**
     * @test update
     */
    public function test_update_water()
    {
        $water = $this->makewater();
        $fakewater = $this->fakewaterData();
        $updatedwater = $this->waterRepo->update($fakewater, $water->id);
        $this->assertModelData($fakewater, $updatedwater->toArray());
        $dbwater = $this->waterRepo->find($water->id);
        $this->assertModelData($fakewater, $dbwater->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_water()
    {
        $water = $this->makewater();
        $resp = $this->waterRepo->delete($water->id);
        $this->assertTrue($resp);
        $this->assertNull(water::find($water->id), 'water should not exist in DB');
    }
}
