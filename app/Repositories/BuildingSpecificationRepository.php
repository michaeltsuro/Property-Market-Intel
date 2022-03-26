<?php

namespace App\Repositories;

use App\Interfaces\BuildingRepositoryInterface;
use App\Models\BuildingSpecification;

class BuildingSpecificationRepository implements BuildingRepositoryInterface {


    public function getBuildingSpecification()
    {
        return BuildingSpecification::all();
    }

    public function getBuildingSpecificationById($buildingId)
    {
        return BuildingSpecification::findOrFail($buildingId);
    }

    public function deleteBuildingSpecification($buildingId)
    {
        BuildingSpecification::destroy($buildingId);
    }

    public function createBuildingSpecification(array $buildingDetails)
    {
        return BuildingSpecification::create($buildingDetails);
    }

    public function updateBuildingSpecification($buildingId, array $newDetails)
    {
        return BuildingSpecification::whereId($buildingId)->update($newDetails);
    }
}
