<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Later>
 */
class LaterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'phanloai' => fake()->name(),
            'lydo'=>fake()->name(),
            'ngayxinphep' => fake()->name(),
            'songaynghi' =>fake()->name(),
            'users_id' => fake()->name(),
            'reason_id'=> fake()->name(),
            'trangthai'=>fake()->name(),
        ];
    }
}
