<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;

class ClasesController extends Controller
{


    public function getClases()
    {
        $clases = Classes::all();
        return view('dashboard.admin.clases.index')->with('clases', $clases);
    }

    public function createClase()
    {
        return view('dashboard.admin.clases.create');
    }

    public function storeClase(Request $request)
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
        return redirect('admin-clases');
    }

    public function editClase($id)
    {
        $clases = Classes::where('id_course', $id)->first();
        return view('dashboard.admin.clases.edit')->with('clases', $clases);
    }


    public function updateClase(Request $request, $id)
    {

        $clase = Classes::where('id_course', $id)->first();
        return $clase;
        #$clase->name = $request->get('name');
        #$clase->id_course = $request->get('course');
        #$clase->date_start = $request->get('date_start');
        #$clase->date_end = $request->get('date_end');

        #$clase->save();

        return redirect('/admin-clases');
    }



    public function destroy($id)
    {
        $course = Classes::find($id);
        $course->delete();

        return redirect('admin-clases');
    }

}
