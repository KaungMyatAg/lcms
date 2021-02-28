<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('auth.changePassword',compact('user'));
    }
    public function update(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'password' => 'required | min:6 | max:15 | confirmed'
        ]);
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect(route('home'))->with("Success","Password Changed Successfully!");
    }
}
