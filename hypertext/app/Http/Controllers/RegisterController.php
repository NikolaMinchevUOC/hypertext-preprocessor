<?php

namespace App\Http\Controllers;

use App\Models\Notification;
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
            'surname' => 'required',
            'telephone' => 'required',
            'nif' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create(request(['name', 'surname', 'telephone', 'nif', 'email', 'role', 'password']));
        $user_update = User::where('email', request(['email']))->first();
        $user_update->role = "student";
        $user_update->save();


        $notification = new Notification;
        $notification->id_student = $user_update->id;
        $notification->work = 0;
        $notification->exam = 0;
        $notification->continuous_assessment = 0;
        $notification->final_note = 0;
        $notification->save();

        auth()->login($user);


        return redirect()->to('/');
    }
}
