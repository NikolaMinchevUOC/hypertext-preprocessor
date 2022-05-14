<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam; 
class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examenes = Exam::all();
        return view('dashboard.exam.index')->with('examenes', $examenes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.exam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $examenes = new Exam();
        $examenes->id_class = $request->get('id_class');
        $examenes->id_student = $request->get('id_student');
        $examenes->name = $request->get('name');
        $examenes->mark = $request->get('mark');

        $examenes->save();

        return redirect('/examenes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $examen = Exam::where('id_exam', $id)->first(); 
        return view('dashboard.exam.edit')->with('examen', $examen);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $examen = Exam::where('id_exam', $id)->first(); 

        $examen->id_class = $request->get('id_class');
        $examen->id_student = $request->get('id_student');
        $examen->name = $request->get('name');
        $examen->mark = $request->get('mark');

        $examen->save();

        return redirect('/examenes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
