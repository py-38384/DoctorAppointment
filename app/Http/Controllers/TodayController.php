<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodayController extends Controller
{
    public function index(){
        // $appointments = Appointment::orderBy("created_at","desc")->with('doctor')->paginate(10);
        $appointments = Appointment::whereDate('appointment_date', Carbon::now()->format('Y-m-d'))->with('doctor')->get();
        return view('today',['appointments'=> $appointments]);
    }
}
