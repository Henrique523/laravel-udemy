<?php

use App\Categoria;
use App\Produto;
use App\ProdutoCategoria;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProdutosCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produtos = Produto::all();
        $categorias = Categoria::all();

        foreach ($produtos as $produto) {
            foreach ($categorias as $categoria) {
                ProdutoCategoria::create([
                    'produto_id' => $produto->id,
                    'categoria_id' => $categoria->id,
                ]);
            }
        }
    }
}
