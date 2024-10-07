<?php
namespace App\Services\Auth;

use Error;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterService
{

    public function register($request)
    {
         //to check if password matches
         $password = $request->input('password');
         $confirmPassword = $request->input('confirm_password');
 
         if($password != $confirmPassword)
         {
            throw new Error("Password do not match");
         }
         //check if email already exist
         $user=User::where("email", $request->input('email'))->first();
         if(isset($user)){
            throw new Error("Email already exist, Pls try again");
         }
         
         //saving the data in the database
         //firstly hash the password
 
         $hashedPassword = Hash::make($password);
 
         //save in the database #1
         User::create([
             'first_name' => $request->input('first_name'),
             'last_name' => $request->input('last_name'),
             'email' => $request->input('email'),
             'phone_number' => $request->input('phone_number'),
             'address' => $request->input('address'),
             'password' => $hashedPassword,
         ]);

        //  //other ways to get and save into the database are;
        //  // 
        //  try {
        //     //get the data from RegisterRequest
        //     $input['first_name'] = $request->input('first_name');
        //     $input['last_name'] = $request->input('last_name');
        //     $input['email'] = $request->input('email');
        //     $input['phone_number'] = $request->input('phone_number');
        //     $input['address'] = $request->input('address');
        //     $input['password'] = $hashedPassword;
        //     $inputs = array_filter($input);

        //     //save the data in the database
        //     User::create($inputs);

           

        //  } catch (\Throwable $th) {
        //     //throw $th;
        //  }

         $newUser=User::where("email", $request->input('email'))->first();
         return $newUser;
    }




    
}






?>