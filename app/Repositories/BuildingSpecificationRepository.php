<?php

namespace App\Repositories;

use App\Interfaces\BuildingRepositoryInterface;
use App\Models\BuildingSpecification;

class BuildingSpecificationRepository implements BuildingRepositoryInterface
{
    /**
     * Get all the building specifications
     *
     * @return collection
     */
    public function getBuildingSpecification()
    {
        return BuildingSpecification::all();
    }

    /**
     * Get a single building specification
     *
     * @param int $buildingSpecificationId
     * @return array
     */
    public function getBuildingSpecificationById($buildingId)
    {
        return BuildingSpecification::findOrFail($buildingId);
    }

    /**
     * Add a new building specification
     *
     * @param int $buildingID
     * @return void
     */
    public function deleteBuildingSpecification($buildingId)
    {
        BuildingSpecification::destroy($buildingId);
    }

    /**
     * Add a building specification
     *
     * @param array $buildingDetails
     * @return void
     */
    public function createBuildingSpecification(array $buildingDetails)
    {
        return BuildingSpecification::create($buildingDetails);
    }

    /**
     * Update a building specification
     *
     * @param int $buildingId
     * @param array $newDetails
     * @return collection
     */
    public function updateBuildingSpecification($buildingId, array $newDetails)
    {
        return BuildingSpecification::whereId($buildingId)->update($newDetails);
    }
}
