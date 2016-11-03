<?php

use App\Entities\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Thiago Dionizio',
            'email' => 'thiago.o.dionizio@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
