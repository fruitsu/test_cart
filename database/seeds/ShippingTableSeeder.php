<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shippings')->insert([
            'name' => 'Free shipping',
            'price' => '0.00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('shippings')->insert([
            'name' => 'Express shipping',
            'price' => '9.99',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('shippings')->insert([
            'name' => 'Courier shipping',
            'price' => '19.99',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
