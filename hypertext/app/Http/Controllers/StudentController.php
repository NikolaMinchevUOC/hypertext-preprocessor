<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {

        //return 'Admin';
        return view('auth.student');
    }
}
