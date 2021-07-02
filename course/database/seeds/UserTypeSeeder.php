<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            [
                'name' => 'Farmer'
            ],
            [
                'name' => 'Food industry'
            ],
            [
                'name' => 'Merchant'
            ],
            [
                'name' => 'Customer'
            ]
        ]);
    }
}
