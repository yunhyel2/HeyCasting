<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Community::class, 20)->create();
        factory(App\User::class, 200)->create();
        factory(App\Comment::class, 500)->create();
    }
}
