<?php

namespace App\Utils;

use Illuminate\Support\Facades\Config;

class Utils
{
    public static function getRootImgPath(string $imgPath, string $imgName)
    {
        return asset(Config::get($imgPath) . '/' .  $imgName);
    }
}
