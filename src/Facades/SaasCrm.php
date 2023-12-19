<?php

namespace Smdm\SaasCrm\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Smdm\SaasCrm\SaasCrm
 */
class SaasCrm extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Smdm\SaasCrm\SaasCrm::class;
    }
}
