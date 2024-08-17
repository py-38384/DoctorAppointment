<x-layout>
    <x-doctors.Form formAction="/doctors/{{$doctor->id}}" :departments="$departments" :doctor="$doctor" />
  </x-layout>