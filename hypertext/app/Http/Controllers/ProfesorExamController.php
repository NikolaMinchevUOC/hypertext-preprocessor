<?php

namespace App\Http\Controllers;

use App\Mail\ExamMail;
use App\Models\Classes;
use App\Models\Exam;
use App\Models\Mensaje;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProfesorExamController extends Controller
{


    public function index()
    {

        //return 'Admin';
        return view('auth.profesor');
    }

    public function createExam1()
    {
        return view('dashboard.profesor.exam.create');
    }

    public function storeExam1(Request $request)
    {

        $exam = new Exam();
        $exam->name = $request->get('name');
        $exam->id_class = $request->get('clase');
        $exam->id_student = $request->get('student');
        $exam->mark = $request->get('mark');
        $exam->save();

        $clase = Classes::where('id_class', $request->get('clase'))->first();
        Mensaje::create([
            'id_student' => $request->get('student'),
            'text' => 'El Exam "' . $request->get('name') . '" de la clase "' . $clase->name . '" ha sido creado ',
        ]);

        $user = User::where('id', $request->get('student'))->first();
        $sendData["clase"] = $clase->name;
        $sendData["exam"] = $request->get('name');
        $sendData["nota"] = $request->get('mark');
        Mail::to($user->email)->send(new ExamMail($sendData));

        echo '<script type="text/javascript">window.location.reload(history.go(-2));</script>';
    }

    public function editExam1($id)
    {
        $exam = Exam::where('id_exam', $id)->first();
        return view('dashboard.profesor.exam.edit')->with('exam', $exam);
    }


    public function updateExam1(Request $request, $id)
    {

        $exam = Exam::where('id_exam', $id)->first();
        $exam->name = $request->get('name');
        $exam->id_class = $request->get('clase');
        $exam->id_student = $request->get('student');
        $exam->mark = $request->get('mark');
        $exam->save();

        $clase = Classes::where('id_class', $request->get('clase'))->first();
        Mensaje::create([
            'id_student' => $request->get('student'),
            'text' => 'El Exam "' . $request->get('name') . '" de la clase "' . $clase->name . '" ha sido actualizado ',
        ]);

        $user = User::where('id', $request->get('student'))->first();
        $sendData["clase"] = $clase->name;
        $sendData["exam"] = $request->get('name');
        $sendData["nota"] = $request->get('mark');
        Mail::to($user->email)->send(new ExamMail($sendData));

        echo '<script type="text/javascript">window.location.reload(history.go(-2));</script>';
    }



    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();

        return redirect()->back();
    }
}
