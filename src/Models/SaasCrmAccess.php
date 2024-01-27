<?php

namespace Smdm\SaasCrm\Models;

use Illuminate\Database\Eloquent\Model;

class SaasCrmAccess extends Model
{
    protected $table = 'saas_crm_access';

    protected $fillable = [
        'client_id',
        'client_secret',
        'access_token',
        'unified_token',
        'expiry_time',
        'status'

    ];
}
