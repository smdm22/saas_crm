<?php

namespace Smdm\SaasCrm\Http\Controllers\Auth;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Smdm\SaasCrm\Models\SaasCrmAccess;

class SaasTokenCheck
{
    public static function getToken()
    {

        $crm_access = SaasCrmAccess::latest()->first();

        // info(['crm_access',$crm_access]);

        $client_id = config('saas-crm.saas_crm_client_id');
        $client_secret = config('saas-crm.saas_crm_client_secret');

        if ($crm_access) {
            $expiry_time = Carbon::parse($crm_access->expiry_time);

            // Check if the token has expired
            if ($expiry_time->lt(Carbon::now())) {
                // Call a function to refresh the token
                $saas_token = self::login($client_id, $client_secret);

                // Assuming refreshCRMToken returns an array with new tokens
                $crm_access->access_token = $saas_token['access_token'];
                $crm_access->unified_token = $saas_token['unified_token'];
                $crm_access->save();

                return $saas_token;

            }

            return [
                'access_token' => $crm_access->access_token,
                'unified_token' => $crm_access->unified_token,
            ];
        } else {

            $saas_token = self::login($client_id, $client_secret);

            // Create a new token record in the database
            $crm_token = SaasCrmAccess::create([
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'access_token' => $saas_token['access_token'],
                'unified_token' => $saas_token['unified_token'],
                'expiry_time' => Carbon::now()->addMonths(11)->addHours(11), // Set the expiry time
                'status' => 'active', // Set the expiry time

            ]);

            return $saas_token;

        }

        return null;
    }

    public static function login($email, $password)
    {

        $client = new Client([
            'base_uri' => config('saas-crm.saas_crm_api_base_url'),
        ]);

        try {
            // Make a request to your Saas CRM login endpoint
            $response = $client->request('POST', rtrim(config('saas-crm.saas_crm_api_version'), '/').'/login', [
                'json' => [
                    'email' => $email,
                    'password' => $password,
                    'user_type' => 'oauth',
                    'user_subtype' => null,
                ],
            ]);

            // Decode the response
            $responseData = json_decode($response->getBody(), true);

            if (isset($responseData['token'])) {
                // Log the user in or perform any other necessary actions
                // For example, you might store the token in the session or use Laravel Passport for API authentication
                return [
                    'access_token' => $responseData['token'],
                    'unified_token' => $responseData['userUnifiedToken'],
                ];
            } else {
                return response()->json(['message' => 'Login failed'], 401);
            }

        } catch (\Exception $e) {
            // Consider logging the exception or handling it as needed
            return response()->json(['message' => 'Login failed'], 401);
        }
    }
}
