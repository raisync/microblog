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
        DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname' => 'Microblog',
            'email' => 'admin@microblog.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);
    }
}
