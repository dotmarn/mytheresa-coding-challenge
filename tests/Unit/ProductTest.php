<?php

namespace Tests\Unit;

use Illuminate\Http\Response;
use Tests\TestCase;
use App\Services\ProductService;

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

    public function test_that_fetching_products_is_successful()
    {
        $this->get(route('fetch-products'))->assertStatus(Response::HTTP_OK);
    }
}
