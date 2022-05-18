<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();

        return redirect('admin-schedule');
    }

    // ************************   Schedule LOGIC

    public function getSchedules()
    {
        $schedules = Schedule::all();
        return view('dashboard.admin.schedule.index')->with('schedules', $schedules);
    }

    public function createSchedule()
    {

        return view('dashboard.admin.schedule.create');
    }

    public function storeSchedule(Request $request)
    {
        $schedule = new Schedule();
        $schedule->time_start = $request->time_start;
        $schedule->time_end = $request->time_end;
        $schedule->day = $request->day;


        $schedule->save();
        return redirect('admin-schedule');
    }

    public function editSchedule($id)
    {
        $schedule = Schedule::where('id_schedule', $id)->first();
        return view('dashboard.admin.schedule.edit')->with('schedule', $schedule);
    }


    public function updateSchedule(Request $request, $id)
    {

        $schedule = Schedule::where('id_schedule', $id)->first();


        $schedule->time_start = $request->time_start;
        $schedule->time_end = $request->time_end;
        $schedule->day = $request->day;


        $schedule->save();
        return redirect('admin-schedule');
    }
}
