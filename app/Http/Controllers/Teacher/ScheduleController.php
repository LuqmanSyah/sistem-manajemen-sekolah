<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Lesson;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $days = [
            0 => 'Minggu',
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
        ];
        $currentDayNumber = now()->dayOfWeek;
        $currentDay = $days[$currentDayNumber];
        $currentTime = now()->format('H:i:s');

        $schedules = Schedule::where('user_id', Auth::user()->id)->latest()->get();

        $nowSchedule = Schedule::where('user_id', Auth::user()->id)->where('day', $currentDay)->where('start_time', '<=', $currentTime)->where('end_time', '>', $currentTime)->first();

        return view('pages.teacher.schedule.index', compact('schedules', 'nowSchedule', 'currentTime'));
    }

    public function absen($id)
    {
        $status = ["Hadir", "Sakit", "Izin", "Alpa"];
        $schedule = Schedule::with('lesson')->find($id);
        $class = Classes::find($schedule->class_id);
        $students = User::where('role', 'siswa')->where('class_id', $class->id)->get();
        return view('pages.teacher.schedule.absen', compact('students', 'schedule', 'status'));
    }

    public function storeAbsen(Request $request)
    {
        dd($request);
        $data['class_id'] = $request->class_id;
        $user = User::where('class_id', $request->class_id)->where('role', 'siswa')->first();
        dd($user);
    }
}
