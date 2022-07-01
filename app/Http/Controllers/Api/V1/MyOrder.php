<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\cardResource;

class MyOrder extends Controller
{
    public function getMyOrder()
    {

        $card =   Card::where('user_id', auth('sanctum')->id())->with('order')->orderBy('id', 'desc')->get();
        $data =  cardResource::collection($card);

        return response()->json($data, 200);
    }
}
