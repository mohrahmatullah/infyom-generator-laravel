<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\water;
use App\Repositories\waterRepository;

trait MakewaterTrait
{
    /**
     * Create fake instance of water and save it in database
     *
     * @param array $waterFields
     * @return water
     */
    public function makewater($waterFields = [])
    {
        /** @var waterRepository $waterRepo */
        $waterRepo = \App::make(waterRepository::class);
        $theme = $this->fakewaterData($waterFields);
        return $waterRepo->create($theme);
    }

    /**
     * Get fake instance of water
     *
     * @param array $waterFields
     * @return water
     */
    public function fakewater($waterFields = [])
    {
        return new water($this->fakewaterData($waterFields));
    }

    /**
     * Get fake data of water
     *
     * @param array $waterFields
     * @return array
     */
    public function fakewaterData($waterFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'quantity' => $fake->word,
            'description' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $waterFields);
    }
}
