<?php

use App\Entities\RolePermission;
use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolePermission::create([
            'role_id'=>2,
            'permission_id'=>1
        ]);
    }
}
