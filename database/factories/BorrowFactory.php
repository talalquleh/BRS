<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
            $users= User::all();
            $books=Book::all();
            $stArr=array('PENDING','ACCEPTED','REJECTED','RETURNED');
            $rand= array_rand($stArr);
         //for now all borrows(Rentals) are handled by one librarian(Horath(1))
        return [
            'user_id' => $users->random()->id,
            'book_id'=>$books->random()->id,
            'status' => $stArr[$rand],
            'request_processed_at' => $this->faker->date(),
            'request_managed_by' =>1,
            'deadline' => $this->faker->date(),
            'returned_at' =>  $this->faker->date(),
            'return_managed_by' =>1
        ];
    }
}
