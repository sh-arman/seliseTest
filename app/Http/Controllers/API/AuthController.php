<?php

namespace App\Http\Controllers\API;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:4',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        }

        if ($validator->passes()) {
            $user = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $token = $user->createToken('auth_token')->plainTextToken;

            // return view('home');
            //  return redirect('home');

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 200);
        }
    }



    public function login(Request $request) {
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            $user = Auth::user();
            $user['token'] = $user->createToken('auth_token')->plainTextToken;
            $user['name'] = $user->name;

            return response()->json([
                'success' => true,
                'data' => $user
            ], 200);
        }else {
            return response()->json([
                'success' => false,
            ], 400);
        }
    }
}
