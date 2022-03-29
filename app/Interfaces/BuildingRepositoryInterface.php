<?php

namespace App\Interfaces;

interface BuildingRepositoryInterface
{

    //define all the required methods for building(all functionality)
    public function getBuildingSpecification();
    public function getBuildingSpecificationById($buildingId);
    public function deleteBuildingSpecification($buildingId);
    public function createBuildingSpecification(array $buildingDetails);
    public function updateBuildingSpecification($buildingId, array $newDetails);
}
