<?php

use Illuminate\Database\Seeder;

class ProductsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductsCategory::create([
            'product_category_name' => "Food"
        ]);
    }
}
