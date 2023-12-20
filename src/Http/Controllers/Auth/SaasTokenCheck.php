<?php

namespace Smdm\SaasCrm\Http\Controllers\Auth;


use Carbon\Carbon;
use Illuminate\Http\Request;

class SaasTokenCheck
{

    public static function getToken()
    {        
        //TODO: fix here
        $saas_token = config('saas-crm.saas_crm_api_key');
        return $saas_token ?: null;
    }
}
