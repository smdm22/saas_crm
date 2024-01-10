<?php

namespace Smdm\SaasCrm;

use Smdm\SaasCrm\Http\Controllers\Records\SaasAccountController;
use Smdm\SaasCrm\Http\Controllers\Records\SaasAvailabilityController;
use Smdm\SaasCrm\Http\Controllers\Records\SaasExcessController;
use Smdm\SaasCrm\Http\Controllers\Records\SaasLeadController;
use Smdm\SaasCrm\Http\Controllers\Records\SaasManufactureController;
use Smdm\SaasCrm\Http\Controllers\Records\SaasProductController;
use Smdm\SaasCrm\Http\Controllers\Records\SaasRFQController;
use Smdm\SaasCrm\Http\Controllers\Records\SaasTaskController;

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

    public static function getProductLookUp($data)
    {
        return SaasProductController::getProductLookUp($data);
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

    public static function createSingleRFQ($data)
    {
        return SaasRFQController::createSingleRFQ($data);

    }

    public static function rfqSearchById($rfq_id)
    {
        return SaasRFQController::rfqSearchById($rfq_id);
    }

    public static function createRfqFromBom($masterBomId, $masterBomItemDetails, $contact)
    {
        return SaasRFQController::createRfqFromBom($masterBomId, $masterBomItemDetails, $contact);

    }

    public static function getSaasCrmAccount($account_id)
    {
        return SaasAccountController::getCrmAccountById($account_id);
    }

    public static function getAccountRFQs($account_id, $fields = null, $conditions = null)
    {
        return SaasAccountController::getAccountRFQs($account_id, $fields, $conditions);
    }

    public static function getAccountQuotes($account_id, $fields = null, $conditions = null)
    {
        return SaasAccountController::getAccountQuotes($account_id, $fields, $conditions);
    }

    public static function getAccountSaleOrders($account_id, $fields = null, $conditions = null)
    {
        return SaasAccountController::getAccountSaleOrders($account_id, $fields, $conditions);
    }

    public static function getAccountInvoices($account_id, $fields = null, $conditions = null)
    {
        return SaasAccountController::getAccountInvoices($account_id, $fields, $conditions);
    }

    public static function createSingleTask($data)
    {
        return SaasTaskController::createSingleTask($data);
    }
}
