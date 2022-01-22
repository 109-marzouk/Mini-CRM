<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Creating/Inserting admin user into the database.
         */
        is_null(User::find(1)) ?
        User::firstOrCreate(
            [
                'name'              => 'admin',
                'email'             => 'admin@admin.com',
                'password'          => Hash::make('password'),
            ]
        ) : null;
    }
}
