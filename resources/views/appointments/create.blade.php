<x-layout>
  <script>
    var doctors = {
      @foreach ($doctors as $doctor)
      "{{$doctor->id}}": {
          name: "{{$doctor->name}}",
          department_name: "{{$doctor->department->name}}",
          department_id: "{{$doctor->department->id}}",
          fee: "{{$doctor->fee}}",
        },
      @endforeach
      }
  
  </script>
  <x-Heading>Book Appointment</x-Heading>
  <x-appointments.CreateForm :doctors="$doctors" :departments="$departments"/>
</x-layout>