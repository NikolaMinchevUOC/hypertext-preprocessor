<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnrolmentController extends Controller
{
    public function getEnrolments()
    {
        $enrollments = Enrollment::all();
        return view('dashboard.admin.enrollments.index')->with('enrollments', $enrollments);
    }

    public function createEnrolment()
    {
        return view('dashboard.admin.enrollments.create');
    }

    public function storeEnrolment(Request $request)
    {

        $enrollmentToCheck = DB::table('enrollments')->where('id_student', '=', $request->get('student'))->where('id_course', '=', $request->get('course'))->first();

        if (empty($enrollmentToCheck)) {
            $enrollment = new Enrollment();
            $enrollment->id_student = $request->get('student');
            $enrollment->id_course = $request->get('course');
            $enrollment->status = 1;
            $enrollment->save();
        }


        return redirect('/admin-enrolments');
    }

    public function editEnrolment($id)
    {
        $enrollment = Enrollment::where('id_enrollment', $id)->first();

        if ($enrollment->status == 1) {
            $enrollment->status = 0;
            $enrollment->save();
        } else {
            $enrollment->status = 1;
            $enrollment->save();
        }
        
        return redirect('/admin-enrolments');
    }


    public function updateEnrolment(Request $request, $id)
    {

        $clase = Enrollment::where('id_class', $id)->first();
        $clase->name = $request->get('name');
        $clase->id_teacher = $request->get('profesor');
        $clase->id_course = $request->get('course');
        $clase->id_schedule = $request->get('schedule');
        $clase->color = $request->get('color');
        $clase->save();

        return redirect('/admin-enrolments');
    }



    public function destroy($id)
    {
        $enrollment = Enrollment::find($id);
        $enrollment->delete();

        return redirect('/admin-enrolments');
    }
}
