<?php

use App\Produto;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 1000) as $index) {
            Produto::create([
                'nome' => $faker->word(),
                'preco' => $faker->randomFloat(2, 1, 1000),
            ]);
        }
    }
}
