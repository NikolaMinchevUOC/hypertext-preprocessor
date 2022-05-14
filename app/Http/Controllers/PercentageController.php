<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Percentage; 

class PercentageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $porcentajes = Percentage::all();
        return view('dashboard.percentage.index')->with('porcentajes', $porcentajes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.percentage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $porcentajes = new Percentage();
        $porcentajes->id_percentage = $request->get('id_percentage');
        $porcentajes->id_course = $request->get('id_course');
        $porcentajes->id_class = $request->get('id_class');
        $porcentajes->continuous_assessment = $request->get('continuous_assessment');
        $porcentajes->exams = $request->get('exams');

        $porcentajes->save();

        return redirect('/porcentajes');
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
        $porcentaje = Percentage::where('id_percentage', $id)->first(); 
        return view('dashboard.percentage.edit')->with('porcentaje', $porcentaje);
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
        $porcentaje = Percentage::where('id_percentage', $id)->first(); 

        $porcentaje->id_course = $request->get('id_course');
        $porcentaje->id_class = $request->get('id_class');
        $porcentaje->continuous_assessment = $request->get('continuous_assessment');
        $porcentaje->exams = $request->get('exams');

        $porcentaje->save();

        return redirect('/porcentajes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $porcentaje = Percentage::where('id_percentage', $id)->first(); 
        $porcentaje->delete();

        return redirect('/porcentajes');
    }
}
