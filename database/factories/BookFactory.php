<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'title'=>$this->faker->realText(10,1),
        'authors'=>$this->faker->firstName(),
        'description'=>$this->faker->sentence(),
        'released_at'=>$this->faker->date(),
        'cover_image'=>$this->faker->imageUrl(),
        'pages'=>$this->faker->randomNumber(3,false),
        'language_code'=>$this->faker->countryCode(),
        'isbn'=>$this->faker->regexify('/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i'),
        'in_stock'=>$this->faker->randomNumber(2,false),
            //
        ];
    }
}
