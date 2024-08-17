<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::with('department')->latest()->paginate(7);
        return view("doctors.index", ["doctors" => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view("doctors.create", ["departments" => $departments]);
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
            'name' => 'required',
            'phone' => 'required',
            'fee' => 'required',
        ]);
        $formFields['department_id'] = $request->department;
        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('doctor','public');
        }
        Doctor::create($formFields);
        return redirect('/doctors')->with('message','Doctor record created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view("doctors.edit", ["doctor" => $doctor, "departments" => Department::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
            $formFields = $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'fee' => 'required',
            ]);
            $formFields['department_id'] = $request->department;
            if($request->removePhoto == 'on'){
                $formFields['photo'] = null;
            }
            if($request->hasFile('photo')){
                $formFields['photo'] = $request->file('photo')->store('doctor','public');
            }
            $doctor->update($formFields);
            return back()->with('message','Doctor record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->back()->with('message',"Successfully deleted a record of Doctor <b>".$doctor->name."</b>");
    }
}
