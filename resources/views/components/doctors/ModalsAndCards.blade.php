@props(['doctors'])
@foreach ($doctors as $doctor)
    <x-Modal 
        id="{{$doctor->id}}" 
        modalTitle="Delete <b>{{$doctor->name}}</b>" 
        modalBody="Are you really want to delete record of doctor <b>{{$doctor->name}}</b>" 
        formAction="/doctors/{{$doctor->id}}"
    />
    <x-doctors.Card :doctor="$doctor" />
@endforeach