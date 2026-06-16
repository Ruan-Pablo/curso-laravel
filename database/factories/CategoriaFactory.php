<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        //    na tabela de categoria tem o campo nome e descriação, entao aqui tem que ser nome
            'nome' => $this->faker->word(), // gera um nome aleatório para a categoria
            'descricao' => $this->faker->sentence(), // gera uma descrição aleatória para a categoria
        ];
    }
}
