<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$users = factory(App\User::class, 10)->create();
        $users = factory(App\User::class, 5)->create();
    }
}
