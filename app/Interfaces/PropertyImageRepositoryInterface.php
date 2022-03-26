<?php

namespace App\Interfaces;

interface PropertyImageRepositoryInterface {
    //define all the required methods
    public function addImages(array $images);
    public function deleteImage($imageId);
    public function getImages();
    public function getImageById($imageId);
}
