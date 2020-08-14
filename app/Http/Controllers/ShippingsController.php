<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Resources\Json\JsonResource;

class ShippingsController extends Controller
{
    /**
     * @return JsonResource
     */
    public function index(): JsonResource
    {
        return JsonResource::collection(Shipping::all());
    }

    /**
     * @param Shipping $shipping
     * @return JsonResource
     */
    public function show(Shipping $shipping): JsonResource
    {
        return new JsonResource($shipping);
    }
}
