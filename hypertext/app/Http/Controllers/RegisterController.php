<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{

    public function create()
    {

        return view('auth.register');
    }

    public function store()
    {

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create(request(['name', 'email', 'role' ,'password']));
        $user_update = User::where('email', request(['email']))->first();
        $user_update->role = "student";
        $user_update->save();

        auth()->login($user);


        return redirect()->to('/');
    }
}
