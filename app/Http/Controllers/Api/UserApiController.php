<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Catagory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    public function showuser($id=null){
        if($id==''){
            $users = User::get();
            return response()->json($users);
        }else {
            $users = User::find($id);
            return response()->json($users);
        }
    }

    public function adduser(Request $request){
        if($request-> isMethod('post')){
            $data = $request->all();

            $rules = [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ];

            $customMessage = [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.required' => 'Email must be valid',
                'password.required' => 'Password is required',
            ];
            $validator = Validator::make($data, $rules, $customMessage);
            if($validator->fails()){
                return response()->json([$validator->errors()],422);
            }

            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();
            $message = 'User Added';
            return response()->json(['message'=> $message],201);
        }
    }
}
