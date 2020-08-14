<?php

namespace App\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Product;


class ProductsController extends Controller
{
    /**
     * @return JsonResource
     */
    public function index(): JsonResource
    {
        return JsonResource::collection(Product::all());
    }

    /**
     * @param Product $product
     * @return JsonResource
     */
    public function show(Product $product): JsonResource
    {
        return new JsonResource($product);
    }
}
