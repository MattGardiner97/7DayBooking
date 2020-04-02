<?php

use Illuminate\Database\Seeder;

class DevAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "name" => "admin",
            "email" => "admin@7day.com",
            "password" => Hash::make("testpassword"),
            "role" => "Admin"
        ]);
    }
}
