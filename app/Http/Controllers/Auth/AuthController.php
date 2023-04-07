<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;


class AuthController extends Controller
{
   public function login(request $request){

    $email = $request->email;

    $data = $request->validate([
        'email' => 'email|required',
        'password' => 'required'
    ]);




    if (!auth()->attempt($data)) {
        return back()->with('error', 'Incorrect Details.Please try again');
    }

    $get_user = User::where('email', $email)
    ->first()->type;

    dd($get_user);

    if($get_user !== 0){
        return back()->with('error', 'You are not an admin');

    }else{
        return redirect('admin-dashboard');
    }





    return response(['user' => auth()->user(), 'token' => $token]);

   }
}
