<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrdersController extends Controller
{
    /**
     * @return JsonResource
     */
    public function index(): JsonResource
    {
        return JsonResource::collection(Order::all());
    }
    /**
     * @param Order $order
     * @return JsonResource
     */
    public function show(Order $order): JsonResource
    {
        return new JsonResource($order);
    }

    public function store(Request $request)
    {
//        $order = Order::create($request->only(''));
//        return new JsonResource($order);
    }
}
