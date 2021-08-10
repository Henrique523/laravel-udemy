<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert(
            ['nome' => 'Nome 1', 'cargo' => 'Analista Júnior']
        );

        DB::table('desenvolvedores')->insert(
            ['nome' => 'Nome 2', 'cargo' => 'Analista Pleno']
        );

        DB::table('desenvolvedores')->insert(
            ['nome' => 'Nome 3', 'cargo' => 'Analista Sênior']
        );
    }
}
