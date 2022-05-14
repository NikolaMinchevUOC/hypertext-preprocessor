<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work; 

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajos = Work::all();
        return view('dashboard.work.index')->with('trabajos', $trabajos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.work.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trabajos = new Work();
        $trabajos->id_class = $request->get('id_class');
        $trabajos->id_student = $request->get('id_student');
        $trabajos->name = $request->get('name');
        $trabajos->mark = $request->get('mark');

        $trabajos->save();

        return redirect('/trabajos');
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
        $trabajo = Work::where('id_work', $id)->first(); 
        return view('dashboard.work.edit')->with('trabajo', $trabajo);
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
        $trabajo = Work::where('id_work', $id)->first(); 

        $trabajo->id_class = $request->get('id_class');
        $trabajo->id_student = $request->get('id_student');
        $trabajo->name = $request->get('name');
        $trabajo->mark = $request->get('mark');

        $trabajo->save();

        return redirect('/trabajos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajo = Work::where('id_work', $id)->first(); 
        $trabajo->delete();

        return redirect('/trabajos');
    }
}
