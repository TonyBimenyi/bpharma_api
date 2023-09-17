<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'=>['required'],
            'email'=>['required','','unique:users'],
            'password'=>['required','min:2','confirmed']
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'registered_as'=>$request->registered_as,
            'password'=>hash::make($request->password),
        ]);
    }
    public function update(Request $request, $id)
    {
   ;
     
        $input = $request->all();
         $user = User::findOrFail($id);
         $input['password'] = bcrypt($input['password']);
         $user->fill($input)->update();    
    }
}
