@props(['appointments' => []])
<div {{$attributes(["class" => "mt-2"])}}>
    @if(count($appointments)>0)
    <!--Madel-->
    @foreach ($appointments as $appointment) 
        <x-Modal 
            id="{{$appointment->appointment_no}}" 
            modalTitle="Delete Appointment of <b>{{$appointment->patient_name}}</b>" 
            modalBody="Are you really want to delete appointment of <b>{{$appointment->patient_name}}</b>" 
            formAction="/appointments/{{$appointment->id}}"
        />
    @endforeach
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Date</th>
                <th scope="col">Doctor</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Patient Phone</th>
                <th scope="col">Total Fee</th>
                <th scope="col">Paid Amount</th>
                <th scope="col">Check</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)    
            <tr style="{{$appointment->check?'text-decoration: line-through;background:gray; color:white':''}}">
                <th>{{$appointment->appointment_no}}</th>
                <td onclick="activeInputField({{$appointment->id}},'appointment_date',this)">{{$appointment->appointment_date}}</td>
                <td>{{$appointment->doctor->name}}</td>
                <td onclick="activeInputField({{$appointment->id}},'patient_name',this)">{{$appointment->patient_name}}</td>
                <td onclick="activeInputField({{$appointment->id}},'patient_phone',this)">{{$appointment->patient_phone}}</td>
                <td>{{$appointment->total_fee}}</td>
                <td onclick="activeInputField({{$appointment->id}},'paid_amount',this)">{{$appointment->paid_amount}}</td>
                <td>
                    <label for="check-{{$appointment->id}}" class="form-check">
                        @if($appointment->check)
                        <input class="form-check-input" type="checkbox" value="" id="check-{{$appointment->id}}" checked onclick="toggle_check(this,{{$appointment->id}})">
                        @else
                        <input class="form-check-input" type="checkbox" value="" id="check-{{$appointment->id}}" onclick="toggle_check(this,{{$appointment->id}})">
                        @endif
                    </label>
                </td>
                <td>
                    
                    <div class="d-inline-flex">
                        <span data-bs-toggle="modal" data-bs-target="#appointment_delete_modal_{{$appointment->appointment_no}}" style="color:red;cursor:pointer;text-decoration:underline">delete</span>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h1>No record found</h1>
    @endif
</div>