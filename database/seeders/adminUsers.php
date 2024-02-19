<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class adminUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users') -> insert([
            'name' => 'admin',
            'email' => 'ad@admin.com',
            'email_verified_at' => NULL,
            'password' => 'root',
            'remember_token' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL,
        ]);
    }
}
