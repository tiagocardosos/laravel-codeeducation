<?php

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

        factory(\CodeProject\Entities\User::class)->create([
            'name' => 'tiago',
            'email' => 'tiagocardosos@gmail.com',
            'password' => bcrypt(123321),
            'remember_token' => str_random(10),
        ]);

        factory(User::class, 25)->create();
    }
}
