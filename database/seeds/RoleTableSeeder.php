<?php

use App\Entities\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(
            [
                'name'=>'super_admin',
                'label'=>'Admin do Sistema',

            ]);
        Role::create(
            [
                'name'=>'manager',
                'label'=>'Admin da Empresa',

            ]);
        Role::create(
            [
                'name'=>'client',
                'label'=>'Cliente da Empresa',

            ]);

    }
}
