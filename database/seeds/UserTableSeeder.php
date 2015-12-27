<?php

use CodeProject\Entities\Client;
use CodeProject\Entities\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     //   User::truncate();

        factory(User::class, 25)->create();
    }
}
