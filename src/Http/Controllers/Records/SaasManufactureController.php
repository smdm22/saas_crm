<?php

namespace Smdm\SaasCrm\Http\Controllers\Records;

use GuzzleHttp\Client;
use Smdm\SaasCrm\Http\Controllers\Auth\SaasTokenCheck;

class SaasManufactureController
{
    public static function search($phrase)
    {
        $token = SaasTokenCheck::getToken();

        if (! $token) {
            return null;
        }

        $client = new Client([
            'base_uri' => config('saas-crm.saas_crm_api_base_url'),
            'headers' => [
                'Authorization' => 'Bearer '.$token["access_token"],
                'X-User-Unique-Token'  => $token["unified_token"], 
            ],
        ]);

        try {

            $response = $client->request('POST', rtrim(config('saas-crm.saas_crm_api_version'), '/').'/manufacturer/search', [
                'json' => ['query' => $phrase],
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return null;
        }
    }

    public static function create($data = [])
    {
        $token = SaasTokenCheck::getToken();

        if (! $token) {
            return null;
        }

        $client = new Client([
            'base_uri' => config('saas-crm.saas_crm_api_base_url'),
            'headers' => [
                'Authorization' => 'Bearer '.$token["access_token"],
                'X-User-Unique-Token'  => $token["unified_token"], 
            ],
        ]);

        try {
            $response = $client->request('POST', rtrim(config('saas-crm.saas_crm_api_version'), '/').'/manufacturer', [
                'json' => $data,
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            // Consider logging the exception or handling it as needed
            return null;
        }
    }
}
