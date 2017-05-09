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
        //user

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

        //role

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

        //permission

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

        //role-permission
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

        //Company
        Permissions::create([
            'name'=> 'company-view',
            'label'=> 'listar as Empresas'
        ]);
        Permissions::create([
            'name'=> 'company-create',
            'label'=> 'Criar as Empresas'
        ]);
        Permissions::create([
            'name'=> 'company-update',
            'label'=> 'Atualizar as Empresas'
        ]);
        Permissions::create([
            'name'=> 'company-delete',
            'label'=> 'Apagar as Empresas'
        ]);

        //Projects

        Permissions::create([
            'name'=> 'project-view',
            'label'=> 'listar as Projetos'
        ]);
        Permissions::create([
            'name'=> 'project-create',
            'label'=> 'Criar as Projetos'
        ]);
        Permissions::create([
            'name'=> 'project-update',
            'label'=> 'Atualizar as Projetos'
        ]);
        Permissions::create([
            'name'=> 'project-delete',
            'label'=> 'Apagar as Projetos'
        ]);
        //Tasks


        Permissions::create([
            'name'=> 'task-view',
            'label'=> 'listar as Tarefas'
        ]);
        Permissions::create([
            'name'=> 'task-create',
            'label'=> 'Criar as Tarefas'
        ]);
        Permissions::create([
            'name'=> 'task-update',
            'label'=> 'Atualizar as Tarefas'
        ]);
        Permissions::create([
            'name'=> 'task-delete',
            'label'=> 'Apagar as Tarefas'
        ]);

        //Importação
        Permissions::create([
            'name'=> 'import-view',
            'label'=> 'listar as Importações'
        ]);
        Permissions::create([
            'name'=> 'import-create',
            'label'=> 'Criar as Importações'
        ]);
        Permissions::create([
            'name'=> 'import-update',
            'label'=> 'Atualizar as Importações'
        ]);
        Permissions::create([
            'name'=> 'import-delete',
            'label'=> 'Apagar as Importações'
        ]);
    }
}
