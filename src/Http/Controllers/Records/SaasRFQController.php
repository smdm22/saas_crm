<?php

namespace Smdm\SaasCrm\Http\Controllers\Records;

use GuzzleHttp\Client;
use Smdm\SaasCrm\Http\Controllers\Auth\SaasTokenCheck;

class SaasRFQController
{
    public static function createSingleRFQ($data = [])
    {
        $token = SaasTokenCheck::getToken();

        if (! $token) {
            return null;
        }

        $client = new Client([
            'base_uri' => config('saas-crm.saas_crm_api_base_url'),
            'headers' => [
                'Authorization' => 'Bearer '.$token['access_token'],
                'X-User-Unique-Token' => $token['unified_token'],
            ],
        ]);

        try {
            $response = $client->request('POST', rtrim(config('saas-crm.saas_crm_api_version'), '/').'/rfq', [
                'json' => $data,
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            // Consider logging the exception or handling it as needed
            return null;
        }
    }

    public static function getAccountRFQs($account_id, $fields = null, $conditions = null)
    {
        $token = SaasTokenCheck::getToken();

        if (! $token) {
            return null;
        }

        $client = new Client([
            'base_uri' => config('saas-crm.saas_crm_api_base_url'),
            'headers' => [
                'Authorization' => 'Bearer '.$token['access_token'],
                'X-User-Unique-Token' => $token['unified_token'],
            ],
        ]);

        try {

            $response = $client->request('POST', rtrim(config('saas-crm.saas_crm_api_version'), '/').'/account/get-rfq', [
                'json' => ['account_id' => $account_id, 'fields' => $fields, 'conditions' => $conditions],
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            // Handle the exception or log it
            return null; // or return a meaningful error message
        }

    }

    public static function rfqSearchById($rfq_id)
    {
        $token = SaasTokenCheck::getToken();

        if (! $token) {
            return null;
        }

        $client = new Client([
            'base_uri' => config('saas-crm.saas_crm_api_base_url'),
            'headers' => [
                'Authorization' => 'Bearer '.$token['access_token'],
                'X-User-Unique-Token' => $token['unified_token'],
            ],
        ]);

        try {

            $response = $client->request('POST', rtrim(config('saas-crm.saas_crm_api_version'), '/').'/rfq/get-by-id', [
                'json' => ['rfq_id' => $rfq_id],
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            // Handle the exception or log it
            return null; // or return a meaningful error message
        }

    }

    public static function createRfqFromBom($masterBomId = null, $masterBomItemDetails = null, $contact = null)
    {
        $token = SaasTokenCheck::getToken();

        if (! $token) {
            return null;
        }

        $client = new Client([
            'base_uri' => config('saas-crm.saas_crm_api_base_url'),
            'headers' => [
                'Authorization' => 'Bearer '.$token['access_token'],
                'X-User-Unique-Token' => $token['unified_token'],
            ],
        ]);

        try {
            $response = $client->request('POST', rtrim(config('saas-crm.saas_crm_api_version'), '/').'/rfq/create-rfq-from-bom', [
                'json' => [
                    'masterBomId' => $masterBomId,
                    'masterBomItemDetails' => $masterBomItemDetails,
                    'contact' => $contact,
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            // Consider logging the exception or handling it as needed
            return null;
        }
    }

    public static function createSingleRFQAlternative($rfq_id, $product_id)
    {

        $token = SaasTokenCheck::getToken();

        if (! $token) {
            return null;
        }

        $client = new Client([
            'base_uri' => config('saas-crm.saas_crm_api_base_url'),
            'headers' => [
                'Authorization' => 'Bearer '.$token['access_token'],
                'X-User-Unique-Token' => $token['unified_token'],
            ],
        ]);

        try {
            $response = $client->request('POST', rtrim(config('saas-crm.saas_crm_api_version'), '/').'/rfq/create-rfq-product-alternatives', [
                'json' => [
                    'rfq_id' => $rfq_id,
                    'product_id' => $product_id,

                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            // Consider logging the exception or handling it as needed
            return null;
        }

    }
}
