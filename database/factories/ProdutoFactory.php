<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'descricao' => strtoupper($this->faker->unique()->word),
            'marca' => strtoupper($this->faker->word),
            'modelo' => strtoupper($this->faker->word),
            'referencia' => strtoupper($this->faker->word),
            'minimo' => $this->faker->randomNumber($nbDigits = 2, $strict = false),
            'maximo' => $this->faker->randomNumber($nbDigits = 2, $strict = false),
            'saldo' => $this->faker->randomNumber($nbDigits = 3, $strict = false),
            'endereco' => strtoupper($this->faker->word),
            'valor' => $this->faker->randomNumber($nbDigits = 4, $strict = false),
        ];
    }
}
