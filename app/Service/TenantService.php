<?php

namespace App\Service;

use App\Models\Tenant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\ValidationException;

class TenantService
{

    private static $tenant;
    private static $domain;
    private static $database;

    public static function switchToTenant(Tenant $tenant)
    {
        if (!$tenant instanceof Tenant) {
            throw ValidationException::withMessages(['field_name' => 'this value is incorrect']);
        }
        DB::purge('system');
        DB::purge('tenant');
        Config::set('database.connections.tenant.database', $tenant->database);

        Self::$tenant = $tenant;
        Self::$domain = $tenant->domain;
        Self::$database = $tenant->database;
        DB::connection('tenant')->reconnect();  
        DB::setDefaultConnection('tenant');
    }

    public static function switchToDefault()
    {
        DB::purge('system');
        DB::purge('tenant');
        DB::connection('system')->reconnect();
        DB::setDefaultConnection('system');
    }

    public static function getTenant()
    {
        return Self::$tenant;
    }
}
