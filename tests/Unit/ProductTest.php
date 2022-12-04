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
}
