<?php

namespace Smdm\SaasCrm;

use Smdm\SaasCrm\Http\Controllers\Records\SaasProductController;

class SaasCrm
{

    public static function productsSearch($phrase)
    {
        return SaasProductController::search($phrase);
    }
}
