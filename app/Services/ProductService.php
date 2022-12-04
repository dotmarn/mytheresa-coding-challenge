<?php

namespace App\Services;

class ProductService 
{
    public function __construct(){}

    public function calculateDiscount(string $category, string $sku, int $price) : object
    {
        $discount_in_percentage = null;

		if ($category == 'boots' || $category == 'boots' && $sku == '000003'){
			$final_price = 0.3 * $price;
			$discount_in_percentage = '30%';
		} else if ($sku == '000003'){
			$final_price = 0.15 * $price;
            $discount_in_percentage = '15%';
		} else {
			$final_price = $price;
		}

		return (object)['final_price' => $final_price, 'discount_percentage' => $discount_in_percentage];
    }
}