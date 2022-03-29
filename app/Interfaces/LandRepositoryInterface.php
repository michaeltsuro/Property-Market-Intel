<?php

namespace App\Interfaces;

interface LandRepositoryInterface
{

    //define all the required methods
    public function addLand(array $landDetails);
    public function updateLand($landId, array $newDetails);
    public function getAllLand();
    public function getLandById($landId);
    public function deleteLand($landId);
}
