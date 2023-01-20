<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ProductResource;

class FrontendController extends Controller
{
    public function list()
    {
        $products = Product::with('category')->orderBy('category_id')->get()->groupBy(function($data) { return $data->category->name; });
        foreach($products as $name => $product) {
            foreach($product as $item) {
                $data = $item;
            }
        }

        return $this->sendResponse(ProductResource::collection($products), 'Products Retrieved Successfully.');
    }
}
