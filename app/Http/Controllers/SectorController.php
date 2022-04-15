<?php

namespace App\Http\Controllers;

use App\Interfaces\SectorRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SectorController extends Controller
{
    protected SectorRepositoryInterface $sectorRepository;

    public function __construct(SectorRepositoryInterface $sectorRepository)
    {
        $this->sectorRepository = $sectorRepository;
    }

    /**
     * Get all sectors
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(
            [
                'data' => $this->sectorRepository->getAllSectors()
            ]
        );
    }

    /**
     * Get single sector
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        $sectorId = $request->route('id');
        return response()->json(
            [
                 'data' => $this->sectorRepository->getSectorById($sectorId)
             ]
        );
    }

    /**
     * Add a new sector
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $sectorDetails = $request->only(
            [
                'sectorname',
                'description'
            ]
        );

        return response()->json(
            [
                'data' => $this->sectorRepository->addSector($sectorDetails)
            ]
        );
    }

    /**
     * Update a sector
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $sectorId = $request->route('id');
        $newDetails = $request->only(
            [
                'sectorname',
                'description'
            ]
        );

        return response()->json(
            [
                'data' => $this->sectorRepository->updateSector($sectorId, $newDetails)
            ]
        );
    }

    /**
     * Delete a sector
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        $sectorId = $request->route('id');

        $this->sectorRepository->deleteSector($sectorId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
