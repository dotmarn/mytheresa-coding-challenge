<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Services\ProductService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const CURRENCY = 'EUR';

    public function run()
    {
        collect($this->products_data())->map(function($item) {

            $result = (new ProductService())->calculateDiscount($item->category, $item->sku, $item->price);

            $price = [
                "original" => $item->price,
                "final" => $result->final_price,
                "discount_percentage" => $result->discount_percentage,
                "currency" => self::CURRENCY
            ];

            Product::updateOrCreate([
                "sku" => $item->sku,
                "category" => $item->category,
                "name" => $item->name,
            ],[
                "price" => $price
            ]);
            
        });
    }

    protected function products_data(): array
    {
        return [
            (object)[
                "sku" => "000001",
                "name" => "BV Lean leather ankle boots",
                "category" => "boots",
                "price" => "8900"
            ],
            (object)[
                "sku" => "000002",
                "name" => "BV Lean leather ankle boots",
                "category" => "boots",
                "price" => "9900"
            ],
            (object)[
                "sku" => "000003",
                "name" => "Ashlington leather ankle boots",
                "category" => "boots",
                "price" => "7100"
            ],
            (object)[
                "sku" => "000004",
                "name" => "Naima embellished suede sandals",
                "category" => "sandals",
                "price" => "79500"
            ],
            (object)[
                "sku" => "000005",
                "name" => "Nathane leather sneakers",
                "category" => "sneakers",
                "price" => "5900"
            ]
        ];
    }
}
