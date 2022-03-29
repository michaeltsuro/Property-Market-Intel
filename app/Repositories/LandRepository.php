<?php

namespace App\Repositories;

use App\Interfaces\LandRepositoryInterface;
use App\Models\Land;

class LandRepository implements LandRepositoryInterface
{

    public function addLand(array $landDetails)
    {
        return Land::create($landDetails);
    }

    public function updateLand($landId, array $newDetails)
    {
        return Land::whereId($landId)->update($newDetails);
    }

    public function getAllLand()
    {
        return Land::all();
    }

    public function getLandById($landId)
    {
        return Land::with('landimages')->findOrFail($landId);
    }

    public function deleteLand($landId)
    {
        Land::destroy($landId);
    }
}
