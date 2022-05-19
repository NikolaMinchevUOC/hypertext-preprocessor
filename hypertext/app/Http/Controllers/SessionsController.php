<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SessionsController extends Controller
{

    public function create()
    {

        return view('auth.login');
    }

    public function store()
    {

        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again',
            ]);
        } else {

            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.index');
            } elseif (auth()->user()->role == 'profesor') {
                return redirect()->route('profesor.index');
            } else if (auth()->user()->role == 'student') {
                return redirect()->route('student.index');
            } else {
                return redirect()->to('/');
            }
        }
    }

    public function destroy()
    {

        auth()->logout();

        return redirect()->to('/');
    }
}
