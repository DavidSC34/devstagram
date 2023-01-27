<?php

namespace Database\Factories;

use Faker\Core\Uuid;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo'=>$this->faker->sentence(5),
            'descripcion'=>$this->faker->sentence(20),
            'imagen'=> $this->faker->uuid() . '.jpg',
            // 'user_id'=> $this->faker->randomElement([1,2,3]),//--> con estos dio erro, por que no exisitian en tabla usuarios
            'user_id'=> $this->faker->randomElement([4,5,6]),
        ];
    }
}
