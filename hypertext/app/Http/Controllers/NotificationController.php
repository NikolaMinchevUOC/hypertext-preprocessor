<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function getNotification()
    {
        $notifications = Notification::all();
        return view('dashboard.admin.notification.index')->with('notifications', $notifications);
    }

    public function createNotification()
    {
        return view('dashboard.admin.notification.create');
    }

    public function storeNotification(Request $request)
    {

        $notificationToCheck = Notification::where('id_student', $request->get('student'))->first();
        if (empty($notificationToCheck)) {
            $notification = new Notification();
            $notification->id_student = $request->get('student');

            if ($request->exam === "on") {
                $notification->exam = 1;
            } else {
                $notification->exam = 0;
            }

            if ($request->work === "on") {
                $notification->work = 1;
            } else {
                $notification->work = 0;
            }

            if ($request->continuous_assessment === "on") {
                $notification->continuous_assessment = 1;
            } else {
                $notification->continuous_assessment = 0;
            }

            if ($request->final_note === "on") {
                $notification->final_note = 1;
            } else {
                $notification->final_note = 0;
            }

            $notification->save();
        } else {
            $notificationToCheck->id_student = $request->get('student');

            if ($request->exam === "on") {
                $notificationToCheck->exam = 1;
            } else {
                $notificationToCheck->exam = 0;
            }

            if ($request->work === "on") {
                $notificationToCheck->work = 1;
            } else {
                $notificationToCheck->work = 0;
            }

            if ($request->continuous_assessment === "on") {
                $notificationToCheck->continuous_assessment = 1;
            } else {
                $notificationToCheck->continuous_assessment = 0;
            }

            if ($request->final_note === "on") {
                $notificationToCheck->final_note = 1;
            } else {
                $notificationToCheck->final_note = 0;
            }

            $notificationToCheck->save();
        }
        return redirect('/admin-notification');
    }

    public function editNotification($id)
    {
        $notification = Notification::where('id_notification', $id)->first();
        return view('dashboard.admin.notification.edit')->with('notification', $notification);
    }


    public function updateNotification(Request $request, $id)
    {

        $notification = Notification::where('id_notification', $id)->first();
        $notification->id_student = $request->get('student');

        if ($request->exam === "on") {
            $notification->exam = 1;
        } else {
            $notification->exam = 0;
        }

        if ($request->work === "on") {
            $notification->work = 1;
        } else {
            $notification->work = 0;
        }

        if ($request->continuous_assessment === "on") {
            $notification->continuous_assessment = 1;
        } else {
            $notification->continuous_assessment = 0;
        }

        if ($request->final_note === "on") {
            $notification->final_note = 1;
        } else {
            $notification->final_note = 0;
        }

        $notification->save();


        return redirect('/admin-notification');
    }



    public function destroy($id)
    {
        $notification = Notification::find($id);
        $notification->delete();

        return redirect('admin-notification');
    }
}
