<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::create([
            'name'       => 'T-shirt',
            'price'       => 30.99,
            'discount'       => 25,
            'weight'       => 0.2,
            'shipping_id' => 1,
            'vat'=>'4.3386',
        ]);

        $product = Product::create([
            'name'       => 'Blouse',
            'price'       => 10.99,
            'discount'       => 10,
            'weight'       => 0.3,
            'shipping_id'       => 2,
            'vat'=>'1.5386',
        ]);

        $product = Product::create([
            'name'       => 'Pants',
            'price'       => 64.99,
            'discount'       => 15,
            'weight'       => 0.9,
            'shipping_id'       => 2,
            'vat'=>'9.0986',
        ]);

        $product = Product::create([
            'name'       => 'Sweatpants',
            'price'       => 84.99,
            'discount'       => 10,
            'weight'       => 1.1,
            'shipping_id'       => 3,
            'vat'=>'11.8986',
        ]);

        $product = Product::create([
            'name'       => 'Jacket',
            'price'       => 199.99,
            'discount'       => 25,
            'weight'       => 2.2,
            'shipping_id'       => 1,
            'vat'=>'27.9986',
        ]);

        $product = Product::create([
            'name'       => 'Shoes',
            'price'       => 79.99,
            'discount'       => 10,
            'weight'       => 1.3,
            'shipping_id'       => 3,
            'vat'=>'11.1986',
        ]);
    }
}
