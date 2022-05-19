<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Percentage;

class PercentageController extends Controller
{
    public function getPercentage()
    {
        $percentages = Percentage::all();
        return view('dashboard.admin.percentage.index')->with('percentages', $percentages);
    }

    public function createPercentage()
    {
        return view('dashboard.admin.percentage.create');
    }

    public function storePercentage(Request $request)
    {

        $percentage = new Percentage();
        $percentage->id_course = $request->get('curso');
        $percentage->id_class = $request->get('clase');
        $percentage->continuous_assessment = $request->get('continuous_assessment');
        $percentage->exams = $request->get('exams');
        $percentage->save();

        return redirect('/admin-percentage');
    }

    public function editPercentage($id)
    {
        $percentage = Percentage::where('id_percentage', $id)->first();
        return view('dashboard.admin.percentage.edit')->with('percentage', $percentage);
    }


    public function updatePercentage(Request $request, $id)
    {

        $percentage = Percentage::where('id_percentage', $id)->first();
        $percentage->id_course = $request->get('curso');
        $percentage->id_class = $request->get('clase');
        $percentage->continuous_assessment = $request->get('continuous_assessment');
        $percentage->exams = $request->get('exams');
        $percentage->save();


        return redirect('/admin-percentage');
    }



    public function destroy($id)
    {
        $exam = Percentage::find($id);
        $exam->delete();

        return redirect('admin-percentage');
    }
}
