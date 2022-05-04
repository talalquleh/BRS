<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $stArr = array('primary', 'secondary', 'success', 'danger', 'warning','info', 'light', 'dark');
        $rand = array_rand($stArr);
        return [
            'name' => $this->faker->word(3, true),
            'style' => $stArr[$rand],
            //k
        ];
    }
}
