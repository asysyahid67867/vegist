<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Sayuran', 'Buah - buahan', 'Organik'];

        foreach ($categories as $key => $value) {
            Category::updateOrCreate([
                'id' => $key+1
            ],[
                'name' => $value
            ]);
        }
    }
}
