<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

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

        echo '<script type="text/javascript">window.location.reload(history.go(-2));</script>';
    }



    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();

        return redirect()->back();
    }
}

