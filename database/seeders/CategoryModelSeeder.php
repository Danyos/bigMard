<?php

namespace Database\Seeders;

use App\Models\Category\CategoryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryModel::create(['name' => 'Electronics']);
        CategoryModel::create(['name' => 'Clothing']);
        CategoryModel::create(['name' => 'Home Decor']);
    }
}
