<?php

namespace Smdm\SaasCrm;

use Smdm\SaasCrm\Http\Controllers\Records\SaasAvailabilityController;
use Smdm\SaasCrm\Http\Controllers\Records\SaasExcessController;
use Smdm\SaasCrm\Http\Controllers\Records\SaasLeadController;
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

    public static function getProductsByIds($ids)
    {
        return SaasProductController::getProductsByIds($ids);
    }

    public static function getProductAvailability($product_id, $days)
    {
        return SaasProductController::getProductAvailability($product_id, $days);
    }

    public static function getProductExcesses($product_id, $days)
    {
        return SaasProductController::getProductExcesses($product_id, $days);
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

    public static function getLeadByEmailAddress($email)
    {
        return SaasLeadController::getLeadByEmailAddress($email);

    }

    public static function createLead($email)
    {
        return SaasLeadController::create($email);

    }

    public static function excessSearchById($excess_id)
    {
        return SaasExcessController::excessSearchById($excess_id);
    }

    public static function availabilitySearchById($excess_id)
    {
        return SaasAvailabilityController::availabilitySearchById($excess_id);
    }
}
