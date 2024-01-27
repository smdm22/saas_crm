<?php

namespace Smdm\SaasCrm\Http\Controllers\Records;

use GuzzleHttp\Client;
use Smdm\SaasCrm\Http\Controllers\Auth\SaasTokenCheck;

class SaasInvoiceController
{
    public static function invoiceSearchById($invoice_id)
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

            $response = $client->request('POST', rtrim(config('saas-crm.saas_crm_api_version'), '/').'/invoice/get-by-id', [
                'json' => ['invoice_id' => $invoice_id],
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            // Handle the exception or log it
            return null; // or return a meaningful error message
        }

    }
}
