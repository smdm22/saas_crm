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
    public static function getLatestProducts($count)
    {
        return SaasProductController::getLatestProducts($count);
    }

    public static function productsSearchByNameAndManufacturerId($product_name, $manufacture_id)
    {
        return SaasProductController::searchByNameAndManufacturerId($product_name, $manufacture_id);
    }

    public static function productsSearchById($product_id)
    {
        return SaasProductController::productsSearchById($product_id);
    }

    public static function createSingleProduct($data)
    {
        return SaasProductController::createSingleProduct($data);
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
