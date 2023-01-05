<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\stokbarang>
 */
class stokbarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'namabarang'=>fake()->firstNameMale(),  
            'deskripsi'=>fake()->sentence(10),
            'jumlah'=>fake()->randomDigitNotNull()
        ];
    }
}
