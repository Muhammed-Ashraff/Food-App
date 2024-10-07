<?php

namespace App\Http\Controllers\API\V1\Auth;

use auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateRequest;
use App\Services\Auth\RegisterService;

class RegisterController extends Controller
{
    protected $registerService;

    public function _construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        $response=(new RegisterService)->register($request);
       
        return response()->json(["message"=>'signup successful', "status"=>true,'data'=>$response,]);

        //to get user id, use
        auth()->user()->id;
    }

        //get a single User
    public function show($id)
    {
        $user = User::where('id',$id)->first();
        return response()->json([ "status"=>true, "data"=>$user, 'code'=> 200]);
    }

    public function index()
    {
        $users = User::orderBy('first_name','ASC')->get();
        return response()->json([ "status"=>true, "data"=>$users, 'code'=> 200]);

    }
    public function update(UpdateRequest $request, $id)
    {
        $attribute = $request->validated();
        try {
            $input['first_name'] = $request->input('first_name');
            $input['last_name'] = $request->input('last_name');
            $input['phone_number'] = $request->input('phone_number');

            $user = User::where('id', $id);

            $user->update([
                "first_name" => $input['first_name'],
                "last_name" => $input['last_name'],
                "phone_number" => $input['phone_number'],
            ]);

            return response()->json(["message"=>'updated successfully', "status"=>true,'code'=> 200]);
            
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(["status"=>false,'code'=> 400]);
        }
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        //delete the user from database
        $user->delete();

        //another for deleting the user
        // $user = User::where('id', $id)->delete();

        return response()->json(["message"=>'deleted successfully', "status"=>true,'code'=> 200]);

    }
}

