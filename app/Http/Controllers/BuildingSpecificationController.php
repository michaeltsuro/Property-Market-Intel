<?php

namespace App\Http\Controllers;

use App\Interfaces\BuildingRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BuildingSpecificationController extends Controller
{
    //building interface instance
    private BuildingRepositoryInterface $buildingRepository;

    public function __construct(BuildingRepositoryInterface $buildingRepository)
    {
        $this->buildingRepository = $buildingRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->buildingRepository->getBuildingSpecification()
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $buildingDetails = $request->only([
            'project_id',
            'grossLeasableArea',
            'numberofUnits',
            'floortoceilingheight',
            'numberoffloors',
            'estimatedvalue'
        ]);

        return response()->json(
            [
                'data' => $this->buildingRepository->createBuildingSpecification($buildingDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $buildingId = $request->route('id');

        return response()->json([
            'data' => $this->buildingRepository->getBuildingSpecificationById($buildingId)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $buildingId = $request->route('id');
        $buildingDetails = $request->only([
            'project_id',
            'grossLeasableArea',
            'numberofUnits',
            'floortoceilingheight',
            'numberoffloors',
            'estimatedvalue'
        ]);

        return response()->json([
            'data' => $this->buildingRepository->updateBuildingSpecification($buildingId, $buildingDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $buildingId = $request->route('id');
        $this->buildingRepository->deleteBuildingSpecification($buildingId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
