<?php

namespace Tests\Unit;

use App\Services\ProductService;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function test_that_no_discount_is_applied()
    {
        $sku = "000002";
        $category = "sandals";
        $price = 5000;
        $result = (new ProductService())->calculateDiscount($category, $sku, $price);

        $this->assertEquals(5000, $result->final_price);
    }

    public function test_that_a_discount_of_15_percent_is_applied()
    {
        $sku = "000003";
        $category = "sandals";
        $price = 5000;
        $result = (new ProductService())->calculateDiscount($category, $sku, $price);

        $this->assertEquals(750, $result->final_price);
    }

    public function test_that_a_discount_of_30_percent_is_applied()
    {
        $sku = "000001";
        $category = "boots";
        $price = 5000;
        $result = (new ProductService())->calculateDiscount($category, $sku, $price);

        $this->assertEquals(1500, $result->final_price);
    }

    public function test_that_the_highest_percentage_discount_is_applied()
    {
        $sku = "000003";
        $category = "boots";
        $price = 5000;
        $result = (new ProductService())->calculateDiscount($category, $sku, $price);

        $this->assertEquals(1500, $result->final_price);
    }
}
