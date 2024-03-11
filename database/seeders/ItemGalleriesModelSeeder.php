<?php

namespace Database\Seeders;

use App\Models\Product\ItemGalleriesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemGalleriesModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ProductGallery=[[
            'item_id' => 1,
            'image_path' => 'admin/src/images/product-1.jpg',
        ],[
            'item_id' => 1,
            'image_path' => 'admin/src/images/product-2.jpg',
        ],[
            'item_id' => 2,
            'image_path' => 'admin/src/images/product-3.jpg',
        ],
            [
            'item_id' => 2,
            'image_path' => 'admin/src/images/product-4.jpg',
        ],    [
            'item_id' => 2,
            'image_path' => 'admin/src/images/product-4.jpg',
        ],    [
            'item_id' => 3,
            'image_path' => 'admin/src/images/product-5.jpg',
        ],    [
            'item_id' => 3,
            'image_path' => 'admin/src/images/product-img2.jpg',
        ],
            [
            'item_id' => 4,
            'image_path' => 'admin/src/images/photo1.jpg',
        ],
            [
            'item_id' => 4,
            'image_path' => 'admin/src/images/photo2.jpg',
        ],
            [
            'item_id' => 5,
            'image_path' => 'admin/src/images/photo3.jpg',
        ],   [
            'item_id' => 5,
            'image_path' => 'admin/src/images/photo6.jpg',
        ],

              [
            'item_id' => 6,
            'image_path' => 'admin/src/images/photo4.jpg',
        ],

            [
            'item_id' => 6,
            'image_path' => 'admin/src/images/photo5.jpg',
      ]
        ];
ItemGalleriesModel::insert($ProductGallery);
    }
}
