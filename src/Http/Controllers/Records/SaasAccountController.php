<?php

namespace Smdm\SaasCrm\Http\Controllers\Records;

use GuzzleHttp\Client;
use Smdm\SaasCrm\Http\Controllers\Auth\SaasTokenCheck;

class SaasAccountController
{
    public static function getCrmAccountById($account_id)
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

            $response = $client->request('POST', rtrim(config('saas-crm.saas_crm_api_version'), '/').'/account/get-by-id', [
                'json' => ['account_id' => $account_id],
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
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
                'Authorization' => 'Bearer '.$token,
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
}
