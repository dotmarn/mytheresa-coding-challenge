<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    public function show(Request $request)
    {
        $paginate = $request->paginate ?? 5;
        $filter = $request->filter_by;
        $price_less_than = $request->priceLessThan;

        $products = Product::when(($filter), function ($query) use($filter) {
            return $query->where('category', 'like', '%' . $filter . '%');
        })->when(($price_less_than), function($query) use($price_less_than){
            return $query->where('price->original', '<=', $price_less_than);
        })->paginate($paginate);
       
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Records fetched successfully...',
            'data' => $products,
        ], Response::HTTP_OK);
    }
}
