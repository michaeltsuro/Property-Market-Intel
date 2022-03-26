<?php

namespace App\Http\Controllers;

use App\Interfaces\PropertyImageRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PropertyImageController extends Controller
{
    //property image interface instance
    private PropertyImageRepositoryInterface $propertyImageRepository;

    public function __construct(PropertyImageRepositoryInterface $propertyImageRepository)
    {
        $this->propertyImageRepository = $propertyImageRepository;
    }
}
