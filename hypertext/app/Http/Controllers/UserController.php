<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('dashboard.profile.edit', compact('user'));
    }

    public function update(User $user)
    { 

        $this->validate(request(), [
            'name' => 'required',
            'surname' => 'required',
            'telephone' => 'required',
            'nif' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);


        $user->name = request('name');
        $user->surname = request('surname');
        $user->telephone = request('telephone');
        $user->nif = request('nif');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();

        return back();
    }
}
