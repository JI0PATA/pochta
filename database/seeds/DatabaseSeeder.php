<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'login' => 'info',
            'password' => Hash::make('info'),
            'group' => 'info'
        ]);

        DB::table('users')->insert([
            'login' => 'user',
            'password' => Hash::make('user'),
            'group' => 'user'
        ]);

        DB::table('users')->insert([
            'login' => 'terminal',
            'password' => Hash::make('terminal'),
            'group' => 'terminal'
        ]);
    }
}
