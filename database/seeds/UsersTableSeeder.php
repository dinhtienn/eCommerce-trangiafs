<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_user = [
            'email' => 'trangiafs@gmail.com',
            'name' => 'trangia',
            'password' => bcrypt('admin')
        ];

        DB::table('users')->insert($new_user);
    }
}
