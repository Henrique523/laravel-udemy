<?php

use App\Categoria;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 5) as $index) {
            Categoria::create([
                'nome' => $faker->word(),
            ]);
        }
    }
}
