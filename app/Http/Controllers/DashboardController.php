<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function profile(){
        $user =Auth::user();
        return View('dashboard.profile',compact('user'));
    
    }

    public function update_profile(Request $request){
        $user =Auth::user();
        $user->update($request->only(['username', 'email']));
        return redirect()->route('dashboard.profile')->with('success', 'Update successful.');
    
    
    }
    
    public function report(){
        return View('dashboard.report');
    }
    public function setting(){
        return View('dashboard.setting');
    }
    
    public function loan(){
        $user_id = auth()->id();
        $user = User::find($user_id);
        $loans = $user->loans;

        return view('dashboard.loan', compact('loans'));
    }
}

