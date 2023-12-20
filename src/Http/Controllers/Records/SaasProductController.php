<?php

namespace Smdm\SaasCrm\Http\Controllers\Records;

use GuzzleHttp\Client;
use Smdm\SaasCrm\Http\Controllers\Auth\SaasTokenCheck;

class SaasProductController
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
                'Authorization' => 'Bearer '.$token,
            ],
        ]);

        try {

            $response = $client->request('POST', rtrim(config('saas-crm.saas_crm_api_version'), '/').'/product/search', [
                'json' => ['query' => $phrase],
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            // Handle the exception or log it
            return null; // or return a meaningful error message
        }
    }
}
