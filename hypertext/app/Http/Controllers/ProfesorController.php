<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Course;
use App\Models\Percentage;
use Illuminate\Http\Request;

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
}
