<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(
            [
                'nome' => 'Camiseta Polo',
                'preco' => 100,
                'estoque' => 4,
                'categoria_id' => 1,
            ]
        );

        DB::table('produtos')->insert(
            [
                'nome' => 'Calça Jeans',
                'preco' => 120,
                'estoque' => 5,
                'categoria_id' => 1,
            ]
        );

        DB::table('produtos')->insert(
            [
                'nome' => 'Camisa Manga Longa',
                'preco' => 130,
                'estoque' => 6,
                'categoria_id' => 1,
            ]
        );

        DB::table('produtos')->insert(
            [
                'nome' => 'PC Gamer',
                'preco' => 140,
                'estoque' => 7,
                'categoria_id' => 2,
            ]
        );

        DB::table('produtos')->insert(
            [
                'nome' => 'Impressora',
                'preco' => 150,
                'estoque' => 8,
                'categoria_id' => 6,
            ]
        );

        DB::table('produtos')->insert(
            [
                'nome' => 'Malbeck',
                'preco' => 160,
                'estoque' => 9,
                'categoria_id' => 3,
            ]
        );

        DB::table('produtos')->insert(
            [
                'nome' => 'Sofá',
                'preco' => 170,
                'estoque' => 10,
                'categoria_id' => 4,
            ]
        );

        DB::table('produtos')->insert(
            [
                'nome' => 'Arroz',
                'preco' => 180,
                'estoque' => 11,
                'categoria_id' => 5,
            ]
        );
    }
}
