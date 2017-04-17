<?php

use App\Entities\Permissions;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permissions::create([
            'name'=> 'user-view',
            'label'=> 'Listagem dos Usuários'
        ]);
        Permissions::create([
            'name'=> 'user-update',
            'label'=> 'Atualização dos Usuários'
        ]);
        Permissions::create([
            'name'=> 'user-delete',
            'label'=> 'Apagar os Usuários'
        ]);


        Permissions::create([
            'name'=> 'role-view',
            'label'=> 'Listagem dos Papeis'
        ]);
        Permissions::create([
            'name'=> 'role-update',
            'label'=> 'Atualização dos Papeis'
        ]);
        Permissions::create([
            'name'=> 'role-delete',
            'label'=> 'Apagar os Papeis'
        ]);


        Permissions::create([
            'name'=> 'permission-view',
            'label'=> 'Listagem das Permissões'
        ]);

        Permissions::create([
            'name'=> 'permission-view',
            'label'=> 'Atualizar as Permissões'
        ]);

        Permissions::create([
            'name'=> 'permission-view',
            'label'=> 'Apagar as Permissões'
        ]);
        Permissions::create([
            'name'=> 'role-permission-view',
            'label'=> 'Apagar as Permissões'
        ]);
        Permissions::create([
            'name'=> 'role-permission-create',
            'label'=> 'Apagar as Permissões'
        ]);
        Permissions::create([
            'name'=> 'role-permission-update',
            'label'=> 'Apagar as Permissões'
        ]);
        Permissions::create([
            'name'=> 'role-permission-delete',
            'label'=> 'Apagar as Permissões'
        ]);
    }
}
