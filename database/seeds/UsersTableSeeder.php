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
        factory(App\User::class, 29)->create();

        App\User::create([
            'name' => 'User Test',
            'email' => 'user.test.12@mail.com',
            'password' => bcrypt('123456')

        ]);
    }
}
