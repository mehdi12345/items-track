<?php

use Illuminate\Database\Seeder;
use App\Product;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'camera1',
            'price' => '2500',
            'path' => 'image2.jpg',
            'user_name' =>'mehdi'
        ]);
        Product::create([
            'name' => 'camera2',
            'price' => '1800',
            'path' => 'image.jpg',
            'user_name' =>'mehdi'
        ]);
        Product::create([
            'name' => 'camera3',
            'price' => '1600',
            'path' => 'image1.jpg',
            'user_name' =>'mehdi'
        ]);
        Product::create([
            'name' => 'camera4',
            'price' => '1500',
            'path' => 'image2.jpg',
            'user_name' =>'mehdi'
        ]);
        Product::create([
            'name' => 'camera3',
            'price' => '1600',
            'path' => 'image1.jpg',
            'user_name' =>'mehdi1'
        ]);
        Product::create([
            'name' => 'camera4',
            'price' => '1500',
            'path' => 'image2.jpg',
            'user_name' =>'mehdi1'
        ]);


    }
}
