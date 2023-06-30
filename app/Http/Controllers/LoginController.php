<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class logincontroller extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('username', 'password');
        
 
        if(Auth::attempt($credentials)){
        $user = auth::user();
         return redirect()->intended('/dashboard');
        }else{
         throw ValidationException::withMessages(['message' => 'Invalid credentials'])
         ->errorBag('default')
         ->redirectTo('/dashboard');
        }
     }
     
     
}