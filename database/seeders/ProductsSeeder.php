<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                "name" => "Iphone 12",
                "desc" => "Iphone 12 moi nhat 2021",
                "price" => "1200000",
                "image" => ""
            ],
            [
                "name" => "Iphone 10",
                "desc" => "Iphone 10 moi nhat 2021",
                "price" => "200000",
                "image" => ""
            ],
            [
                "name" => "Iphone 11",
                "desc" => "Iphone 11 moi nhat 2021",
                "price" => "1000000",
                "image" => ""
            ]
        ]);
    }
}
