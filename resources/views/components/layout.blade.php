<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor Appointment</title>
    <link rel="icon" type="image/x-icon" href="/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
          <a class="navbar-brand" style="color: skyblue" href="/">Doctor Appointment</a>
          <div class="d-flex justify-content-between">
            <x-NavLink >Home</x-NavLink>
            <x-NavLink href="today">Today's Appointments</x-NavLink>
            <x-NavLink href="doctors">Doctors</x-NavLink>
            <x-NavLink href="appointments/create">Book Appointment</x-NavLink>
          </div>
        </div>
      </nav>

      
      <div class="container mt-4">
        <x-Alert/>
        {{$slot}}
      </div>
      <footer><p>Copyright © 2024 Doctor Appointment All right reserved</p></footer>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="{{mix('js/app.js')}}"></script>
  </body>
  </html>