<?php

declare(strict_types=1);

namespace App\Helpers;

class RatingHelper
{
    /**
     * 小数部を持つ値を "整数部 + 0.5" に変換する
     *
     * @param float|null $rating
     * @return float
     */
    public static function roundRating(?float $rating): float
    {
        $rounded = $rating ?? 0;

        if (0 < $rating && $rating < 1) {
            $rounded = 0.5;
        } elseif (1 < $rating && $rating < 2) {
            $rounded = 1.5;
        } elseif (2 < $rating && $rating < 3) {
            $rounded = 2.5;
        } elseif (3 < $rating && $rating < 4) {
            $rounded = 3.5;
        } elseif (4 < $rating && $rating < 5) {
            $rounded = 4.5;
        }

        return floor($rounded * 10) / 10;
    }
}
