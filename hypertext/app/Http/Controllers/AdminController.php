<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Classes;
use App\Models\Schedule;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {

        //return 'Admin';
        return view('auth.admin');
    }



    // ************************   COURSES LOGIC

    public function courses()
    {
        $courses = Course::all();
        return view('dashboard.admin.cursos.index')->with('courses', $courses);
    }

    public function createCourse()
    {

        return view('dashboard.admin.cursos.create');
    }

    public function storeCourse(Request $request)
    {
        $curso = new Course();
        $curso->name = $request->name;
        $curso->description = $request->description;
        $curso->date_start = $request->start;
        $curso->date_end = $request->end;

        if ($request->active === "on") {
            $curso->active = 1;
        } else {
            $curso->active = 0;
        }

        $curso->save();
        return redirect('admin-courses');
    }

    public function editCourse($id)
    {
        $curso = Course::where('id_course', $id)->first();
        return view('dashboard.admin.cursos.edit')->with('curso', $curso);
    }


    public function updateCourse(Request $request, $id)
    {

        $curso = Course::where('id_course', $id)->first();

        $curso->name = $request->get('name');
        $curso->description = $request->get('description');
        $curso->date_start = $request->get('date_start');
        $curso->date_end = $request->get('date_end');
        if ($request->active === "on") {
            $curso->active = 1;
        } else {
            $curso->active = 0;
        }

        $curso->save();

        return redirect('/admin-courses');
    }



    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect('admin-courses');
    }

   
}
