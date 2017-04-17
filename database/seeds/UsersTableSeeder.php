<?php

use App\Entities\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=> bcrypt('admin'),
        ]);
        User::create([
            'name'=>'Thiago Dionizio',
            'email'=>'thiago.o.dionizio@gmail.com',
            'password'=> bcrypt('admin'),
        ]);
        User::create([
            'name'=>'Andrea',
            'email'=>'andrea@solucaoproject.com.br',
            'password'=> bcrypt('admin'),
        ]);
    }
}
