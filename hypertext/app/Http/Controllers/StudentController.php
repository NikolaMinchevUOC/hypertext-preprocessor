<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {

        //return 'Admin';
        return view('auth.student');
    }

    public function studentShowClases($id)
    {
        $clases = Classes::where('id_course', $id)->get();
        return view('dashboard.student.clases')->with('clases', $clases);
    }

    public function studentShowWorks($id)
    {
        $id_studnet = Auth::id();
        $works = DB::table('works')->where('id_class', '=', $id)->where('id_student', '=', $id_studnet)->get();
        return view('dashboard.student.works')->with('works', $works);
    }

    public function studentShowExams($id)
    {
        $id_studnet = Auth::id();
        $exams = DB::table('exams')->where('id_class', '=', $id)->where('id_student', '=', $id_studnet)->get();
        return view('dashboard.student.exams')->with('exams', $exams);
    }

    public function studentShowMensajes()
    {
        $id_student = Auth::id();
        $mensajes = DB::table('mensajes')->where('id_student', '=', $id_student)->get();
        return view('dashboard.student.mensajes')->with('mensajes', $mensajes);
    }
}
