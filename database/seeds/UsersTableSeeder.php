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
        App\User::create([
            'name' => 'User Test',
            'email' => 'user.test.12@mail.com',
            'password' => bcrypt('123456'),
            'twitter_username' => 'laravelphp'
        ]);

        App\User::create([
            'name' => 'Bill Gates',
            'email' => 'billgates@mail.com',
            'password' => bcrypt('7891011'),
            'twitter_username' => 'BillGates'
        ]);

        App\User::create([
            'name' => 'Donald Trump',
            'email' => 'donaldtrump@mail.com',
            'password' => bcrypt('121314'),
            'twitter_username' => 'realDonaldTrump'
        ]);

        App\User::create([
            'name' => 'Novak Djokovic',
            'email' => 'novakdjokovic@mail.com',
            'password' => bcrypt('151617'),
            'twitter_username' => 'DjokerNole'
        ]);

        App\User::create([
            'name' => 'Andy Stanley',
            'email' => 'andystanley@mail.com',
            'password' => bcrypt('181920'),
            'twitter_username' => 'AndyStanley'
        ]);

        App\User::create([
            'name' => 'Steven Furtick',
            'email' => 'stevenfurtick@mail.com',
            'password' => bcrypt('212223'),
            'twitter_username' => 'stevenfurtick'
        ]);

        App\User::create([
            'name' => 'Rami Malek',
            'email' => 'ramimalek@mail.com',
            'password' => bcrypt('242526'),
            'twitter_username' => 'ItsRamiMalek'
        ]);
    }
}
