<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = [
            ['name' => 'tenant1', 'domain' => 'www.tenant1.com', 'database' => 'tenant1'],
            ['name' => 'tenant2', 'domain' => 'www.tenant2.com', 'database' => 'tenant2'],
            ['name' => 'tenant3', 'domain' => 'www.tenant3.com', 'database' => 'tenant3'],
        ];

        Tenant::insert($tenant);
    }
}
