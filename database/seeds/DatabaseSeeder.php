<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // php artisan migrate:fresh && php artisan db:seed 
        (new UsersTableSeeder())->run();
        (new BilletsTableSeeder())->run();
        (new CommentsTableSeeder())->run();
    }
}
