<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {

        //return 'Admin';
        return view('auth.admin');
    }

    public function courses()
    {
        $courses = Course::all();
        return view('auth.adminCourses')->with('courses', $courses);
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect('admin-courses');
    }
}
