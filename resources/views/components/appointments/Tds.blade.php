@props(['appointment'])
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