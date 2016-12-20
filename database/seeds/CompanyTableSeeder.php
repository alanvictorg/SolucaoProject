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
            'name' => "IMAGEM E AÇÃO",
            'manager' => "THIAGO DIONIZIO",
            'phone' => "85981152855",
        ]);
    }
}
