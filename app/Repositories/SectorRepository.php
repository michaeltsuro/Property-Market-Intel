<?php

namespace App\Repositories;

use App\Interfaces\SectorRepositoryInterface;
use App\Models\ProjectSector;

class SectorRepository implements SectorRepositoryInterface
{
    /**
     * Add a new sector
     *
     * @param array $sectorDetails
     * @return collection
     */
    public function addSector(array $sectorDetails)
    {
        return ProjectSector::create($sectorDetails);
    }

    /**
     * Update a sector
     *
     * @param int $sectorId
     * @param array $newDetails
     * @return collection
     */
    public function updateSector($sectorId, array $newDetails)
    {
        return ProjectSector::whereId($sectorId)->update($newDetails);
    }

    /**
     * Delete a sector
     *
     * @param int $sectorId
     * @return void
     */
    public function deleteSector($sectorId)
    {
        ProjectSector::destroy($sectorId);
    }

    /**
     * Get a single sector
     *
     * @param int $sectorId
     * @return collection
     */
    public function getSectorById($sectorId)
    {
        return ProjectSector::findOrFail($sectorId);
    }

    /**
     * Get all the sectors
     *
     * @return collection
     */
    public function getAllSectors()
    {
        return ProjectSector::with('projects')->get();
    }

    public function getProjectsBySector()
    {
        //
    }
}
