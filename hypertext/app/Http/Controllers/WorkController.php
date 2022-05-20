<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Mensaje;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{

    public function getWorks()
    {
        $works = Work::all();
        return view('dashboard.admin.work.index')->with('works', $works);
    }

    public function createWork()
    {
        return view('dashboard.admin.work.create');
    }

    public function storeWork(Request $request)
    {

        $work = new Work();
        $work->name = $request->get('name');
        $work->id_class = $request->get('clase');
        $work->id_student = $request->get('student');
        $work->mark = $request->get('mark');
        $work->save();

        $clase = Classes::where('id_class', $request->get('clase'))->first();
        Mensaje::create([
            'id_student' => $request->get('student'),
            'text' => 'El Trabajo "' . $request->get('name') . '" de la clase "' . $clase->name . '" ha sido creado',
        ]);

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


        $clase = Classes::where('id_class', $request->get('clase'))->first();
        Mensaje::create([
            'id_student' => $request->get('student'),
            'text' => 'El Trabajo "' . $request->get('name') . '" de la clase "' . $clase->name . '" ha sido actualizado ',
        ]);

        return redirect('/admin-works');
    }



    public function destroy($id)
    {
        $course = Work::find($id);
        $course->delete();

        return redirect('admin-works');
    }
}
