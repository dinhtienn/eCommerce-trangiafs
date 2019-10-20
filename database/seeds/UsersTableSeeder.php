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
        $new_user = [
            'email' => 'dinhtiennguyen.1202@gmail.com',
            'name' => 'dinhtien',
            'password' => bcrypt('122198')
        ];

        DB::table('users')->insert($new_user);
    }
}
