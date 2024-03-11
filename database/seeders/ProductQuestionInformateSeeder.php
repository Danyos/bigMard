<?php

namespace Database\Seeders;

use App\Models\Product\ProductQuestionInformate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductQuestionInformateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Product = [[

            'item_id' => 1,
            'question' => "Color",
            'answer' => "Yellow",
        ],[

            'item_id' => 1,
            'question' => "Available ",
            'answer' => " In Stock",
        ],[

            'item_id' => 1,
            'question' => "Category",
            'answer' => "All over the World.",
        ],[

            'item_id' => 1,
            'question' => "Shipping Fee ",
            'answer' => "2$",
        ],[

            'item_id' => 2,
            'question' => "Color",
            'answer' => "red",
        ],[

            'item_id' => 2,
            'question' => "Available ",
            'answer' => " In Stock",
        ],[

            'item_id' => 2,
            'question' => "Category",
            'answer' => "All over the World.",
        ],[

            'item_id' => 2,
            'question' => "Shipping Fee ",
            'answer' => "2$",
        ],[

            'item_id' => 3,
            'question' => "Color",
            'answer' => "Yellow",
        ],[

            'item_id' => 3,
            'question' => "Available ",
            'answer' => " In Stock",
        ],[

            'item_id' => 3,
            'question' => "Category",
            'answer' => "All over the World.",
        ],[

            'item_id' => 3,
            'question' => "Shipping Fee ",
            'answer' => "2$",
        ],[

            'item_id' => 4,
            'question' => "Color",
            'answer' => "Yellow",
        ],[

            'item_id' => 4,
            'question' => "Available ",
            'answer' => " In Stock",
        ],[

            'item_id' => 4,
            'question' => "Category",
            'answer' => "All over the World.",
        ],[

            'item_id' => 4,
            'question' => "Shipping Fee ",
            'answer' => "2$",
        ],
            ];

        ProductQuestionInformate::insert($Product);
    }
}
