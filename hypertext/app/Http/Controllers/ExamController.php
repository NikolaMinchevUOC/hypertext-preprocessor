<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function getExams()
    {
        $exams = Exam::all();
        return view('dashboard.admin.exam.index')->with('exams', $exams);
    }

    public function createExam()
    {
        return view('dashboard.admin.exam.create');
    }

    public function storeExam(Request $request)
    {

        $exam = new Exam();
        $exam->name = $request->get('name');
        $exam->id_class = $request->get('clase');
        $exam->id_student = $request->get('student');
        $exam->mark = $request->get('mark');
        $exam->save();

        return redirect('/admin-exams');
    }

    public function editExam($id)
    {
        $exam = Exam::where('id_exam', $id)->first();
        return view('dashboard.admin.exam.edit')->with('exam', $exam);
    }


    public function updateExam(Request $request, $id)
    {

        $exam = Exam::where('id_exam', $id)->first();
        $exam->name = $request->get('name');
        $exam->id_class = $request->get('clase');
        $exam->id_student = $request->get('student');
        $exam->mark = $request->get('mark');
        $exam->save();

        return redirect('/admin-exams');
    }



    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();

        return redirect('admin-exams');
    }
}
