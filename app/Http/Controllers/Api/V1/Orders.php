<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToArray;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpParser\JsonDecoder;

class Orders extends Controller
{

    public function card(Request $req)
    {

        Card::create(['user_id' => auth('sanctum')->id()]);
        $card_id = Card::where('user_id', auth('sanctum')->id())->orderBy('id', 'desc')->value('id');
    

        foreach ($req as $key ) {
            
            foreach ($key as $data) {
                if (is_array($data) && isset($data['product_id'])){

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

       Card::where('id',$card_id)->update(['total' => Order::where('card_id',$card_id)->sum('summation')]);
        return response()->json("Done", 200,);
    }
}/*

 'card_id',
        'product_id',
        'quantity',
        'price',
        'summation'
*/
