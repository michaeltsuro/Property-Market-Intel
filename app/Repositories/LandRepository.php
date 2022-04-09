<?php

namespace App\Repositories;

use App\Interfaces\LandRepositoryInterface;
use App\Models\Land;

class LandRepository implements LandRepositoryInterface
{
    /**
     * Add a new land
     *
     * @param array $landDetails
     * @return collection
     */
    public function addLand(array $landDetails)
    {
        return Land::create($landDetails);
    }

    /**
     * Update a land
     *
     * @param int $landId
     * @param array $newDetails
     * @return collection
     */
    public function updateLand($landId, array $newDetails)
    {
        return Land::whereId($landId)->update($newDetails);
    }

    /**
     * Get all the lands
     *
     * @return collection
     */
    public function getAllLand()
    {
        return Land::all();
    }

    /**
     * Get a single land
     *
     * @param int $landId
     * @return array
     */
    public function getLandById($landId)
    {
        return Land::with('landimages')->findOrFail($landId);
    }

    /**
     * Delete a land
     *
     * @param int $landId
     * @return void
     */
    public function deleteLand($landId)
    {
        Land::destroy($landId);
    }
}
