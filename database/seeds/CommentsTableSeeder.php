<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CommentsTableSeeder extends Seeder
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
            DB::table('comments')->insert([
                'user_id' => rand(1,9),
                'billet_id' => rand(1,9),
                'content' => str_random(55),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
