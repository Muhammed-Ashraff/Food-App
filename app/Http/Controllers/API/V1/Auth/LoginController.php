<?php

namespace App\Http\Controllers\API\V1\Auth;

use Error;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function Login (LoginRequest $request){
        $attribute=$request->validated();

        try {
            //find user by email
            $user = User::where("email", $request->email)->first();
         if(!$user || !Hash::check($request->password,$user->password)){  
            return response()->json(["message"=>'Login successful', "status"=>true, "data"=>$user, 'code'=> 200]);
         }

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(["message"=>'Invalid login credential, pls try again', "status"=>false, 'code'=> 400]);
        }
    }
}
