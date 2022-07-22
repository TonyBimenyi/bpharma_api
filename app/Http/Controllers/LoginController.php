<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
   public function login(Request $request)
   {
        $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        if(Auth::attempt($request->only('email','password'))){
            return response()->json([
                'data' => [
                    "user" => Auth::user(),
                ],
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        };
        throw ValidationException::withMessages([
            'email'=>['The provided credentials are incorrect.']
        ]);
   }
   public function me(Request $request)
   {
       return $request->user();
   }

}
