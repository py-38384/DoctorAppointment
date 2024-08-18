<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function check(Request $request)
    {
        try {
            $id = $request->id;
            $status = $request->status;
            $appointment = Appointment::find($id);
            if ($status == 'true') {
                $appointment->check = true;
            } else {
                $appointment->check = false;
            }
            $appointment->save();
            return [
                'task' => 'complete',
                'status' => $appointment->check,
            ];
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return ['task' => 'incomplete'];
        }
    }
    public function appointment_date(Request $request)
    {
        try {
            $id = $request->id;
            $coulmn = $request->coulmn;
            $value = $request->value;
            $appointment = Appointment::find($id);
            if ($coulmn == "appointment_date") {
                $appointment->appointment_date = $value;
            } elseif ($coulmn == "patient_name") {
                $appointment->patient_name = $value;
            } elseif ($coulmn == "patient_phone") {
                $appointment->patient_phone = $value;
            } elseif ($coulmn == "paid_amount") {
                $appointment->paid_amount = $value;
            } else {
                return ['task' => 'incomplete', 'status' => 'Invalid Request'];
            }
            $appointment->save();
            return ['task' => 'complete', 'status' => 'good'];
        } catch (\Throwable $th) {
            return ['task' => 'incomplete', 'status' => 'Server Error'];
        }
    }
    public function check_doctor_available(Request $request)
    {
        $maxAppointmentPerDay = 2;
        try {
            $date = $request->date;
            $doctorId = $request->doctorId;
            $todaysAppointment = [];
            $doctor = Doctor::find($doctorId);
            $appointments = $doctor->appointment;
            foreach ($appointments as $appointment) {
                $existingAppointmentDate = Carbon::parse($appointment->appointment_date);
                $possibleNewAppointmentDate = Carbon::parse($date);
                if ($possibleNewAppointmentDate->isSameDay($existingAppointmentDate)) {
                    array_push($todaysAppointment, $appointment);
                }
            }
            if (count($todaysAppointment) >= $maxAppointmentPerDay) {
                return ['available' => 'false'];
            } else {
                return ['available' => 'true'];
            }
        } catch (\Throwable $th) {
            return ['task' => 'incomplete', 'error' => $th->getMessage()];
        }
    }
}
