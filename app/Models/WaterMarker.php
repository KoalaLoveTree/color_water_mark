<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image;

class WaterMarker
{
    protected $colorsMap = [
        PrimaryColorDetector::RED => 'images/watermarks/black_test.jpg',
        PrimaryColorDetector::BLUE => 'images/watermarks/yellow_test.jpg',
        PrimaryColorDetector::GREEN => 'images/watermarks/red_test.jpg',
    ];

    public function addWaterMark(string $image): string
    {
        $mark = Image::make($this->colorsMap[App::make('color_detector')->getProminentColor($image)]);
        $image = Image::make($image);

        $resizedWatermark = public_path(uniqid());
        $mark->resize($image->getWidth() / 4, $image->getHeight() / 4)->save($resizedWatermark);
        $image->insert($resizedWatermark, 'bottom-left', 5, 5);
        $imagePath = 'images/' . uniqid('img_') . '.png';
        $image->save(public_path($imagePath));
        unlink($resizedWatermark);

        return $imagePath;
    }
}
