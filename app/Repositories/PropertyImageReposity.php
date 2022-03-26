<?php

namespace App\Repositories;

use App\Interfaces\PropertyImageRepositoryInterface;
use App\Models\PropertyImage;

class PropertyImageRepository implements PropertyImageRepositoryInterface{

    public function addImages(array $images)
    {
        return PropertyImage::create($images);
    }

    public function deleteImage($imageId)
    {
        PropertyImage::destroy($imageId);
    }

    public function getImageById($imageId)
    {
        return PropertyImage::findOrFail($imageId);
    }

    public function getImages()
    {
        return PropertyImage::with('project')->get();
    }
}
