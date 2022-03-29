<?php

namespace App\Http\Controllers;

use App\Interfaces\LandRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LandController extends Controller
{
    //land interface instance
    private LandRepositoryInterface $landRepository;

    public function __construct(LandRepositoryInterface $landRepository)
    {
        $this->landRepository = $landRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json(
            [
            'data' => $this->landRepository->getAllLand()
            ]
        );
    }

    public function store(Request $request): JsonResponse
    {
        $landDetails = $request->only(
            [
            'user_id',
            'landname',
            'country',
            'province',
            'city',
            'landsize',
            'landoverview',
            'landbronchure',
            'images',
            'lowerlimitprice',
            'upperlimitprice',
            'usdequivalent',
            'is_sold'
            ]
        );

        //for multiple images
        $imagefiles = [];
        if($request->hasFile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $name = time().rand(1,100).'.'.$image->extension();
                $image->move(public_path('uploads'), $name);
                $imagefiles[] = $name;
            }
        }

        $landDetails['images'] = $imagefiles;

        return response()->json(
            [
                'data' => $this->landRepository->addLand($landDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $landId = $request->route('id');

        return response()->json(
            [
            'data' => $this->landRepository->getLandById($landId)
            ]
        );
    }

    public function update(Request $request): JsonResponse
    {
        $landId = $request->route('id');
        $landDetails = $request->only(
            [
            'user_id',
            'landname',
            'country',
            'province',
            'city',
            'landsize',
            'landoverview',
            'landbronchure',
            'images',
            'lowerlimitprice',
            'upperlimitprice',
            'usdequivalent',
            'is_sold'
            ]
        );

        //for multiple images
        $imagefiles = [];
        if($request->hasFile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $name = time().rand(1,100).'.'.$image->extension();
                $image->move(public_path('uploads'), $name);
                $imagefiles[] = $name;
            }
        }

        $landDetails['images'] = $imagefiles;

        return response()->json(
            [
            'data' => $this->landRepository->updateLand($landId, $landDetails)
            ]
        );
    }

    public function destroy(Request $request): JsonResponse
    {
        $landId = $request->route('id');
        $this->landRepository->deleteLand($landId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }


}
