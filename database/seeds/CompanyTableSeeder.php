<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Entities\Company::create([
            'name' => 'Include Tecnologia',
            'manager' => 'Thiago Dionizio',
            'phone' => '(85)98115.2855',
        ]);
    }
}
