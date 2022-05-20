<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Course;
use App\Models\Percentage;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfesorController extends Controller
{
    public function index()
    {

        //return 'Admin';
        return view('auth.profesor');
    }

    public function profesorShowClases($id)
    {
        $clases = Classes::where('id_course', $id)->get();
        return view('dashboard.profesor.clases')->with('clases', $clases);
    }






    public function modificarPorcentage($id_course, $id_clase)
    {
        $curso = Course::where('id_course', $id_course)->first();
        $clase = Classes::where('id_class', $id_clase)->first();
        $percentage = Percentage::where('id_course', $id_course)->where('id_class', $id_clase)->first();
        return view('dashboard.profesor.porcentage')->with('percentage', $percentage)->with('curso', $curso)->with('clase', $clase);
    }

    public function updatePercentage(Request $request, $id)
    {

        $percentage = Percentage::where('id_percentage', $id)->first();
        $percentage->id_course = $request->get('curso');
        $percentage->id_class = $request->get('clase');
        $percentage->continuous_assessment = $request->get('continuous_assessment');
        $percentage->exams = $request->get('exams');
        $percentage->save();


        return redirect('/profesor-clases/' . $percentage->id_course);
    }

    public function profesorShowStudents($id_course, $id_clase)
    {
        $curso = Course::where('id_course', $id_course)->first();
        $clase = Classes::where('id_class', $id_clase)->first();

        $students = DB::table('users')
            ->join('enrollments', 'users.id', '=', 'enrollments.id_student')
            ->where('enrollments.id_course', $id_course)->select('users.*')
            ->get();

        return view('dashboard.profesor.students')->with('clase', $clase)->with('course', $curso)->with('students', $students);
    }

    public function profesorShowTrabajos($id_course, $id_clase, $id_student)
    {
        $curso = Course::where('id_course', $id_course)->first();
        $clase = Classes::where('id_class', $id_clase)->first();
        $student = User::where('id', $id_student)->first();

        $works = DB::table('works')
            ->where('works.id_class', $id_clase)
            ->where('works.id_student', $id_student)->select('works.*')
            ->get();

        return view('dashboard.profesor.work.index')->with('clase', $clase)->with('course', $curso)->with('student', $student)->with('works', $works);
    }


    /********************* WORKS CRUD ****************************/
    public function storeWork(Request $request)
    {

        $work = new Work();
        $work->name = $request->get('name');
        $work->id_class = $request->get('clase');
        $work->id_student = $request->get('student');
        $work->mark = $request->get('mark');
        $work->save();

        return redirect('/admin-works');
    }

    public function editWork($id)
    {
        $work = Work::where('id_work', $id)->first();
        return view('dashboard.admin.work.edit')->with('work', $work);
    }


    public function updateWork(Request $request, $id)
    {

        $work = Work::where('id_work', $id)->first();
        $work->name = $request->get('name');
        $work->id_class = $request->get('clase');
        $work->id_student = $request->get('student');
        $work->mark = $request->get('mark');
        $work->save();

        return redirect('/admin-works');
    }



    public function destroy($id)
    {
        $course = Work::find($id);
        $course->delete();

        return redirect('admin-works');
    }
}
