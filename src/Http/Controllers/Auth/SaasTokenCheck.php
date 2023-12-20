<?php

namespace Smdm\SaasCrm\Http\Controllers\Auth;

class SaasTokenCheck
{
    public static function getToken()
    {
        //TODO: fix here
        $saas_token = config('saas-crm.saas_crm_api_key');

        return $saas_token ?: null;
    }
}
