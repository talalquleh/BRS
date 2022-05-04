<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\each;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('borrows')->truncate();
        Borrow::factory(4)->create();
        
    }
}
