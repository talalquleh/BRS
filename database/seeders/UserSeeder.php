<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        //the order of creating the users matters
        User::factory()->create([
            'name' => 'Horvath',
            'email' => 'librarian@brs.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_librarian' => 1,

        ]);
        User::factory()->create([
            'name' => 'Anni',
            'email' => 'reader@brs.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),

        ]);
        User::factory(10)->create();
    }
}
