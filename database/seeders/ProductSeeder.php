<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        foreach ($categories as $key => $category) {
            for ($i=1; $i <= 5; $i++) { 
                Product::updateOrCreate([
                    'name' => 'Produk '.$i,
                    'category_id' => $category->id,
                ],[
                    'price' => $i*1000,
                    'description' => 'Vivamus egestas ante quis nisi vestibulum viverra',                    
                ]);
            }
        }
    }
}
