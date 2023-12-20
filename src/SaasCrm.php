<?php

namespace Smdm\SaasCrm;

use Smdm\SaasCrm\Http\Controllers\Records\SaasManufactureController;
use Smdm\SaasCrm\Http\Controllers\Records\SaasProductController;

class SaasCrm
{
    public static function productsSearch($phrase)
    {
        return SaasProductController::search($phrase);
    }

    public static function manufacturesSearch($name)
    {
        return SaasManufactureController::search($name);
    }

    public static function createManufacture($data)
    {
        return SaasManufactureController::create($data);
    }
}
