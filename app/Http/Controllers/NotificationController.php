<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification; 

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notificaciones = Notification::all();
        return view('dashboard.notification.index')->with('notificaciones', $notificaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.notification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notificaciones = new Notification();
        $notificaciones->id_student = $request->get('id_student');
        $notificaciones->work = $request->get('work');
        $notificaciones->exam = $request->get('exam');
        $notificaciones->continuous_assessment = $request->get('continuous_assessment');
        $notificaciones->final_note = $request->get('final_note');
        
        $notificaciones->save();

        return redirect('/notificaciones');
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
        $notificacion = Notification::where('id_notification', $id)->first(); 
        return view('dashboard.notification.edit')->with('notificacion', $notificacion);
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
        $notificacion = Notification::where('id_notification', $id)->first(); 

        $notificacion->id_student = $request->get('id_student');
        $notificacion->work = $request->get('work');
        $notificacion->exam = $request->get('exam');
        $notificacion->continuous_assessment = $request->get('continuous_assessment');
        $notificacion->final_note = $request->get('final_note');

        $notificacion->save();

        return redirect('/notificaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notificacion = Notification::where('id_notification', $id)->first(); 
        $notificacion->delete();

        return redirect('/notificaciones');
    }
}
