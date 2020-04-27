<?php

namespace App\Models;


use ColorThief\ColorThief;

class PrimaryColorDetector
{
    const RED = 'red';
    const GREEN = 'green';
    const BLUE = 'blue';

    public function getProminentColor(string $image): string
    {
        $colorPal = array_reverse(ColorThief::getPalette($image, 2, 5));
        return $this->rgbToPrimary(array_pop($colorPal));
    }

    private function rgbToPrimary(array $color): string
    {
        if ($color[0] > $color[1] && $color[0] > $color[2]) {
            return static::RED;
        }

        if ($color[1] > $color[0] && $color[1] > $color[2]) {
            return static::GREEN;
        }

        return static::BLUE;
    }
}
