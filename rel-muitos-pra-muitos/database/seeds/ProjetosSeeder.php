<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjetosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projetos')->insert(
            ['nome' => 'Projeto 1', 'estimativa_horas' => 200]
        );

        DB::table('projetos')->insert(
            ['nome' => 'Projeto 2', 'estimativa_horas' => 100]
        );

        DB::table('projetos')->insert(
            ['nome' => 'Projeto 3', 'estimativa_horas' => 300]
        );
    }
}
