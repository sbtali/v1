<?php

namespace App\Http\Controllers;

use App\Order;
use App\Http\Resources\OrderCollection as OrderCollection;
use App\Http\Resources\OrderResource as OrderResource;

class OrderController extends Controller
{
    /**
     * Display a listing of the User orders.
     *
     * @return OrderCollection
     */
    public function index()
    {
       $userOrders = Order::where('userID', auth()->id())->get();
       return new OrderCollection($userOrders);
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return OrderResource
     */
    public function show(Order $order)
    {
        if($order->userID == auth()->id()){
             return new OrderResource($order);
         }else{
            return response()->json([
                'message' => 'The order you\'re trying to view doesn\'t seem to be yours, hmmmm.',
            ], 403);
         }

    }

}
