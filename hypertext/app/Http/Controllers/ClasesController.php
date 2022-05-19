<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\User;

class ClasesController extends Controller
{


    public function getClases()
    {
        $clases = Classes::all();
        return view('dashboard.admin.clases.index')->with('clases', $clases);
    }

    public function createClases()
    {
        return view('dashboard.admin.clases.create');
    }

    public function storeClases(Request $request)
    {
        $clase = new Classes();
        $clase->name = $request->get('name');
        $clase->id_teacher = $request->get('profesor');
        $clase->id_course = $request->get('course');
        $clase->id_schedule = $request->get('schedule');
        $clase->color = $request->get('color');
        $clase->save();

        return redirect('/admin-clases');
    }

    public function editClase($id)
    {
        $clases = Classes::where('id_class', $id)->first();
        return view('dashboard.admin.clases.edit')->with('clases', $clases);
    }


    public function updateClases(Request $request, $id)
    {

        $clase = Classes::where('id_class', $id)->first();
        $clase->name = $request->get('name');
        $clase->id_teacher = $request->get('profesor');
        $clase->id_course = $request->get('course');
        $clase->id_schedule = $request->get('schedule');
        $clase->color = $request->get('color');
        $clase->save();

        return redirect('/admin-clases');
    }



    public function destroy($id)
    {
        $course = Classes::find($id);
        $course->delete();

        return redirect('admin-clases');
    }
}
