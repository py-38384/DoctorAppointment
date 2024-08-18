@props(['appointments'])
@foreach ($appointments as $appointment) 
    <x-Modal 
        id="{{$appointment->appointment_no}}" 
        modalTitle="Delete Appointment of <b>{{$appointment->patient_name}}</b>" 
        modalBody="Are you really want to delete appointment of <b>{{$appointment->patient_name}}</b>" 
        formAction="/appointments/{{$appointment->id}}"
    />
@endforeach