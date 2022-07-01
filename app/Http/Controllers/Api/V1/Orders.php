<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Card;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\cardResource;

class Orders extends Controller
{

    public function card(Request $req)
    {

        Card::create(['user_id' => auth('sanctum')->id()]);
        $card_id = Card::where('user_id', auth('sanctum')->id())->orderBy('id', 'desc')->value('id');


        foreach ($req as $key) {

            foreach ($key as $data) {
                if (is_array($data) && isset($data['product_id'])) {

                    Order::create([
                        "card_id" => $card_id,
                        "product_id" => $data["product_id"],
                        'price' => $data["price"],
                        'quantity' => $data['quantity'],
                        'summation' => $data['quantity'] * $data['price']
                    ]);
                }
            }
        }

        Card::where('id', $card_id)->update(['total' => Order::where('card_id', $card_id)->sum('summation')]);
        $orders = Order::where('card_id', $card_id)->select('product_id', 'price', 'quantity', 'summation')->get();
        return response()->json(["Oder_Id" => $card_id, 'orders' => $orders], 200);
    }

   

    public function confirmOrder(Request $req)
    {

        $check = Card::where('id',$req->order_id)->count();

        
        if($check == 0){
        return response()->json(['You Order ID Not Found',null], 200,);
        }

        $image = "" ;
        
        if (request()->hasFile("image")) {
            $image = it()->upload("image", "pay/" . $req->order_id);
        }

        $card =  Card::where('id', $req->order_id)->update([
            "image_notification" => $image,
            "number_notification" => $req->number_notification,
            "status" => true
        ]);

        $card =   Card::where('id',$req->order_id)->with('order')->get();
        $data =  cardResource::collection($card);

        return response()->json(['Successfully Comfiram Order' , $data ], 200);
    }
}
