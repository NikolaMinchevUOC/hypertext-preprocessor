<?php

namespace App\Http\Controllers;

use App\Mail\WorkMail;
use App\Models\Classes;
use App\Models\Mensaje;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ProfesorWorkController extends Controller
{

    public function index()
    {

        //return 'Admin';
        return view('auth.profesor');
    }

    public function createWork1()
    {
        return view('dashboard.profesor.work.create');
    }

    public function storeWork1(Request $request)
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

        $user = User::where('id', $request->get('student'))->first();
        $sendData["clase"] = $clase->name;
        $sendData["work"] = $request->get('name');
        $sendData["nota"] = $request->get('mark');
        Mail::to($user->email)->send(new WorkMail($sendData));

        echo '<script type="text/javascript">window.location.reload(history.go(-2));</script>';
    }

    public function editWork1($id)
    {
        $work = Work::where('id_work', $id)->first();
        return view('dashboard.profesor.work.edit')->with('work', $work);
    }


    public function updateWork1(Request $request, $id)
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

        $user = User::where('id', $request->get('student'))->first();
        $sendData["clase"] = $clase->name;
        $sendData["work"] = $request->get('name');
        $sendData["nota"] = $request->get('mark');
        Mail::to($user->email)->send(new WorkMail($sendData));

        echo '<script type="text/javascript">window.location.reload(history.go(-2));</script>';
    }



    public function destroy($id)
    {
        $course = Work::find($id);
        $course->delete();

        return redirect()->back();
    }
}
