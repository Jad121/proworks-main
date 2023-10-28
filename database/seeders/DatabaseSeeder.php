<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('ws_country')->insert([
            'ws_country_name_en' => 'Lebanon',
            'ws_country_name_ar' => 'لبنان',
            'ws_country_name_cn' => "Lebanon",
            'ws_country_created_by' => 1,
        ]);


        DB::table('ws_user')->insert([
            'ws_user_first_name' => 'admin',
            'ws_user_last_name' => 'admin',
            'ws_user_address' => Str::random(20),
            'ws_user_phone' => Str::random(10),
            'ws_user_email' => 'admin@gmail.com',
            'ws_user_password' => Hash::make('admin123'),
            'ws_country_id' => 1,
            'ws_user_created_by' => 1,
        ]);

    }
}
