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


}
