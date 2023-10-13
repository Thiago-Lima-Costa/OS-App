<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceOrders>
 */
class ServiceOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'customer_id' => Customer::pluck('id')->random(),
            'product' => fake()->word(),
            'complaint' => fake()->paragraph(),
            'diagnosis' => fake()->paragraph(),
            'value' => fake()->randomFloat(2, 50, 999),
        ];
    }
}
