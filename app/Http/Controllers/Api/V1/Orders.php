<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Card;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\cardResource;

class Orders extends Controller
{

    public function cardTake(Request $data)
    {

        $card_id = Card::where('user_id', auth('sanctum')->id())->where('status', false)->value('id');

        if (!$card_id) {
            $card = Card::create(['user_id' => auth('sanctum')->id()]);
            $card_id = $card->id;
        }

        if ($card_id) {

            if (!$data['product_id'])
                return response()->json(['Product is Required' => null], 200,);

            if (!$data['price'])
                return response()->json(['price is Required' => null], 200,);

            if (!$data['quantity'])
                return response()->json(['quantity is Required' => null], 200,);

            Order::create([
                "card_id" => $card_id,
                "product_id" => $data["product_id"],
                'price' => $data["price"],
                'quantity' => $data['quantity'],
                'summation' => $data['quantity'] * $data['price']
            ]);
            Card::where('id', $card_id)->update(['total' => Order::where('card_id', $card_id)->sum('summation')]);
            
            $card = cardResource::collection(Card::where('id',$card_id)->with('order')->get());

            return response()->json($card, 200);
        }
    }

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

        $check = Card::where('id', $req->order_id)->count();

        if ($check == 0) {
            return response()->json(['You Order ID Not Found', null], 201,);
        }

        $image = "";

        if (request()->hasFile("image")) {
            $image = it()->upload("image", "pay/" . $req->order_id);
        }

        $card =  Card::where('id', $req->order_id)->update([
            "image_notification" => $image,
            "number_notification" => $req->number_notification,
            "status" => true
        ]);

        $card =   Card::where('id', $req->order_id)->with('order')->get();
        $data =  cardResource::collection($card);

        return response()->json(['Successfully Comfiram Order', $data], 200);
    }
}
