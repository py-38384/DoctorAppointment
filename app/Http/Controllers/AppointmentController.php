<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->q;
        $q_category = $request->q_category;
        if($q){
            if($q_category){
                if($q_category == "doctor"){
                    $appointments = Appointment::whereHas("doctor", function($q_obj) use($q){
                        $q_obj->where("name", "like","%".$q."%");
                    })
                    ->with('doctor')
                    ->orderBy('appointment_date', 'asc')
                    ->paginate(10);
                    return view('welcome',[
                        'appointments' => $appointments,
                        'q' => $q,
                        'category' => $q_category
                    ]);
                }
                if($q_category == "department"){
                    $appointments = Appointment::whereHas('doctor', function ($q_obj) use ($q) {
                        $q_obj->whereHas('department', function($q_obj) use ($q){
                            $q_obj->where('name','LIKE', '%' . $q . '%');
                        });
                    })
                    ->with('doctor')
                    ->orderBy('appointment_date', 'asc')
                    ->paginate(10);
                    return view('welcome',[
                        'appointments' => $appointments,
                        'q' => $q,
                        'category' => $q_category
                    ]);
                }
                if($q_category == "date"){
                    if($q == "today"){
                        $appointments = Appointment::whereDate('appointment_date','=',Carbon::today()->toDateString())
                        ->with('doctor')
                        ->orderBy('appointment_date', 'asc')
                        ->paginate(10);
                        dd($appointments);
                        return view('welcome',[
                            'appointments' => $appointments,
                            'q' => $q,
                            'category' => $q_category
                        ]);
                    }
                    elseif($q == "tomorrow"){
                        $appointments = Appointment::whereDate('appointment_date','=',Carbon::tomorrow()->toDateString())
                        ->with('doctor')
                        ->orderBy('appointment_date', 'asc')
                        ->paginate(10);
                        return view('welcome',[
                            'appointments' => $appointments,
                            'q' => $q,
                            'category' => $q_category
                        ]);
                    }
                    elseif($q == "yesterday"){
                        $appointments = Appointment::whereDate('appointment_date','=',Carbon::yesterday()->toDateString())
                        ->with('doctor')
                        ->orderBy('appointment_date', 'asc')
                        ->paginate(10);
                        return view('welcome',[
                            'appointments' => $appointments,
                            'q' => $q,
                            'category' => $q_category
                        ]);
                    }
                    else{
                        try {
                            $appointments = Appointment::whereDate('appointment_date','=',Carbon::parse($q))
                            ->with('doctor')
                            ->orderBy('appointment_date', 'asc')
                            ->paginate(10);
                            return view('welcome',[
                                'appointments' => $appointments,
                                'q' => $q,
                                'category' => $q_category
                            ]);
                        } catch (\Throwable $th) {
                            return view('welcome',[
                                'q' => $q,
                                'category' => $q_category
                            ]);
                        }
                    }
                }
                if($q_category == "appointment_number"){
                    $appointments_no = (int)$q;
                    if($appointments_no > 0){
                        $appointments = Appointment::where("appointment_no","=", $appointments_no)
                        ->with('doctor')
                        ->orderBy('appointment_date', 'asc')
                        ->paginate(10);
                        return view('welcome',[
                            'appointments' => $appointments,
                            'q' => $q,
                            'category' => $q_category
                        ]);
                    }
                    else{
                        return view('welcome',[
                            'q' => $q,
                            'category' => $q_category
                        ]);
                    }
                }
                if($q_category == "patient_name"){
                    $appointments = Appointment::where("patient_name",'LIKE', '%' . $q . '%')
                    ->with('doctor')
                    ->orderBy('appointment_date', 'asc')
                    ->paginate(10);
                    return view('welcome',[
                        'appointments' => $appointments,
                        'q' => $q,
                        'category' => $q_category
                    ]);
                }
                if($q_category == "total_fee"){
                    $appointments = Appointment::where("total_fee","=", $q)
                    ->with('doctor')
                    ->orderBy('appointment_date', 'asc')
                    ->paginate(10);
                    return view('welcome',[
                        'appointments' => $appointments,
                        'q' => $q,
                        'category' => $q_category
                    ]);
                }
                if($q_category == "paid_amount"){
                    $appointments = Appointment::where("paid_amount","=", $q)
                    ->with('doctor')
                    ->orderBy('appointment_date', 'asc')
                    ->paginate(10);
                    return view('welcome',[
                        'appointments' => $appointments,
                        'q' => $q,
                        'category' => $q_category
                    ]);
                }
                if($q_category == "check"){
                    return back()->with('message',"Please clear the search query before <b>check</b> search");
                }
                if($q_category == "uncheck"){
                    return back()->with('message',"Please clear the search query before <b>uncheck</b> search");
                }
            }
            
            $appointments = Appointment::
                            where('appointment_no', 'LIKE', '%' . $q . '%')
                            ->orWhere('appointment_date','LIKE', '%' . $q .'%')
                            ->orWhereHas('doctor', function ($q_obj) use ($q){
                                $q_obj->where('name','LIKE', '%' . $q .'%');
                            })
                            ->orwhereHas('doctor', function ($q_obj) use ($q) {
                                $q_obj->whereHas('department', function($q_obj) use ($q){
                                    $q_obj->where('name','LIKE', '%' . $q . '%');
                                });
                            })
                            ->orWhere('patient_name', 'LIKE', '%' . $q . '%')
                            ->orWhere('patient_phone', 'LIKE', '%' . $q . '%')
                            ->orWhere('paid_amount', 'LIKE', '%' . $q . '%')
                            ->orWhere('total_fee', 'LIKE', '%' . $q . '%')
                            ->with('doctor')
                            ->orderBy('appointment_date', 'asc')
                            ->paginate(10);
            return view('welcome',[
                'appointments' => $appointments,
                'q' => $q,
            ]);
        }
        if($q_category == "check"){
            $appointments = Appointment::where('check','=',true)
            ->with('doctor')
            ->orderBy('appointment_date', 'asc')
            ->paginate(10);
            return view('welcome',[
                'appointments' => $appointments,
                'q' => $q,
                'category' => $q_category
            ]);
        }
        if($q_category == "uncheck"){
            $appointments = Appointment::where('check','=',false)
            ->with('doctor')
            ->orderBy('appointment_date', 'asc')
            ->paginate(10);
            return view('welcome',[
                'appointments' => $appointments,
                'q' => $q,
                'category' => $q_category
            ]);
        }
        return view('welcome',['appointments' => Appointment::with('doctor')->orderBy('appointment_date', 'asc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $doctors = Doctor::with('department')->get();
        return view('appointments.create',["departments" => $departments, "doctors" => $doctors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'patient_name' => 'required',
            'patient_phone' => 'required',
            'paid_amount' => 'required',
        ]);
        if($request->date == ''){
            return back()->withErrors(['date' => 'Please select a date'])->withInput();
        }
        $formFields["appointment_date"] = $request->date;
        if($request->doctor == 'not-selected'){
            return back()->withErrors(['doctor' => 'Please select a doctor'])->withInput();
        }
        $formFields["doctor_id"] = $request->doctor;
        $formFields["total_fee"] = Doctor::find($request->doctor)->fee;
        $appointments = Appointment::whereDate('created_at', Carbon::today())->get();
        $appointment_no = 1;
        foreach( $appointments as $appointment ){
            if($appointment->appointment_no > $appointment_no){
                $appointment_no = $appointment->appointment_no;
            }
        }
        $formFields['appointment_no'] = $appointment_no+1;
        Appointment::create($formFields);
        return redirect('/appointments/create')->with('message','Appointment record created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {   
        $appointment->delete();
        return redirect()->back()->with('message',"Successfully deleted A Appointment of <b>".$appointment->patient_name."</b>");
    }
}
