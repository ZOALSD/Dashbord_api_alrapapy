<?php
namespace App\Http\Controllers\Api\V1\Auth;

use App\Models\User;
use App\Models\Token;
use Illuminate\Http\Request;
use App\Http\Requests\AuthApi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Register extends Controller {

	public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where(['phone' => $request->phone])->first();

        if ($user != null) {
         
                $user_id = User::where(['phone' => $request->phone])->value('id');

                $token = Token::where('tokenable_id', $user_id)->count();
                if ($token != 0) {
                    $user->tokens()->delete();
                }

                $token = $user->createToken($request->device_name)->plainTextToken;
                return response()->json(['stutus' => true, 'token' => $token, 'Data' => $user], 200);
            
        } else {
            return response()->json(['Stutus' => false, 'Message' => 'Your Number Phone Is Wrong'], 200);

        }

    }
	

	public function Sigin(Request $request)
    {
		$data = $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users|numeric',
            // 'device_name' => 'required',
        ]);

        $user = User::create($data);
        $token = $user->createToken($request->device_name)->plainTextToken;

        $dataa = User::where('id', $user->id)->first();

        return response()->json(['stutus' => true, 'token' => $token, 'Data' => $dataa], 200);

    }


	public function UserUpdate(Request $request)
    {
        $id = Auth::user()->id;

        $request->validate([
            'name' => 'nullable|string|min:3',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'phone' => 'nullable|numeric|unique:users,phone,' . $id,
        ]);

        if ($request->email == null) {
            $email = User::where('id', $id)->value('email');
        } else {
            $email = $request->email;
        }

        if ($request->name == null) {
            $name = User::where('id', $id)->value('name');
        } else {
            $name = $request->name;
        }

        if ($request->phone == null) {
            $phone = User::where('id', $id)->value('phone');
        } else {
            $phone = $request->phone;
        }

                $user = User::find($id);
                $user->name = $name;
                $user->email = $email;
                $user->phone = $phone;
                $user->save();
      
            return response(['stuts' => 'Success Data Updated', 'Data' => $user]);

    }

}
