<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php artisan db:seed --class=UsersTableSeeder -v (-v pour debug)
        for ($i = 0; $i < 30; $i++) {
            DB::table('users')->insert([
                'username' => str_random(5),
                'name' => str_random(5),
                'birthdate' => Carbon::now(),
                'lastname' => str_random(5),
                'email' => str_random(10) . '@gmail.com',
                'password' => bcrypt('kebab'),
                'created_at' => Carbon::now(),
            ]);
        }
    }
        
}
