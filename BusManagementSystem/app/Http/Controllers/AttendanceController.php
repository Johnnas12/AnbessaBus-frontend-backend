<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()

{
    $user = User::find(1);
    $attendances = Attendance::with('user')->get();
    return view('Admin.attendance.index', compact('attendances', 'user'));
}

public function create()
{
    $user = User::find(1);
    $users = User::where('type', '!=', '4')->get();
    return view('Admin.attendance.create', compact('users', 'user'));
}

public function store(Request $request)
{
    $user = User::find(1);
    $attendance = new Attendance();
    $attendance->user_id = $request->user_id;
    $attendance->date = $request->date;
    $attendance->in_time = $request->in_time;
    $attendance->out_time = $request->out_time;
    $attendance->is_present = true;
    $attendance->save();

    return redirect()->route('attendances.index', compact('user'));
}

public function togglePresence(Attendance $attendance)
{
    $attendance->is_present = !$attendance->is_present;
    $attendance->save();

    return redirect()->route('attendances.index')->with('success', 'Attendance status updated successfully.');
}
}
