<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Elequent\Model;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name'=> str_random(10),
                'last_name' => str_random(10),
                'email'=>str_random(10).'@gmail.com',
                'password'=>bcrypt('secret'),

        ]);
    }
}
