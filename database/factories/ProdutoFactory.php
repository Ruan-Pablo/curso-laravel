<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Categoria;

/**
 * @extends Factory<Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nome = $this->faker->sentence();
        return [
            'nome' => $nome,
            'descricao' => $this->faker->paragraph(),
            'preco' => $this->faker->randomNumber(2),
            'slug' => \Str::slug($nome), // gera uma URL amigavel
            'imagem' => $this->faker->imageUrl(400, 400),
            'id_user' => User::pluck('id')->random(), // extrai uma informação aleatoria da coluna 'id' da tabela 'users'
            'id_categoria' => Categoria::pluck('id')->random()
        ];
    }
}
