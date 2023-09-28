<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('sliders')->insert([
            [
                "banner" => "frontend/images/slider_1.jpg",
                "type" => "New Arrivals",
                "title" => "Men's Fashion",
                "starting_price" => "49.99",
                "btn_url" => "#",
                "serial" => "1",
                "status" => true,
            ],
            [
                "banner" => "frontend/images/slider_2.jpg",
                "type" => "Hot Deals",
                "title" => "Men's Fashion",
                "starting_price" => "49.99",
                "btn_url" => "#",
                "serial" => "2",
                "status" => true,
            ],
            [
                "banner" => "frontend/images/slider_3.jpg",
                "type" => "New Season",
                "title" => "Winter Fashion",
                "starting_price" => "99.99",
                "btn_url" => "#",
                "serial" => "3",
                "status" => true,
            ],
        ]);
    }
}
