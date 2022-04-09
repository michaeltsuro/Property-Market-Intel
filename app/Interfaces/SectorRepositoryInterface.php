<?php

namespace App\Interfaces;

interface SectorRepositoryInterface {
    //the required methods
    public function addSector(array $sectorDetails);
    public function updateSector($sectorId, array $newDetails);
    public function getProjectsBySector();
    public function deleteSector($sectorId);
    public function getSectorById($sectorId);
    public function getAllSectors();
}
