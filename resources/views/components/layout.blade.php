<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
          <a class="navbar-brand" style="color: skyblue" href="/">Doctor Appointment</a>
          <div class="d-flex justify-content-between">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-light">
                <li class="nav-item">
                  <a class="nav-link {{request()->is('/')? 'text-light':'text-secondary'}}" aria-current="page" href="/">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-light">
                <li class="nav-item">
                  <a class="nav-link {{request()->is('today')? 'text-light':'text-secondary'}}" aria-current="page" href="/today">Today's Appointments</a>
                </li>
            </ul>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link {{request()->is('doctors')? 'text-light':'text-secondary'}}" aria-current="page" href="/doctors">Doctors</a>
                </li>
            </ul>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link {{request()->is('appointments/create')? 'text-light':'text-secondary'}}" aria-current="page" href="/appointments/create">Book Appointment</a>
                </li>
            </ul>
          </div>
        </div>
      </nav>

      
      <div class="container mt-4">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{!!session('message')!!}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        {{$slot}}
      </div>
      <footer><p>Copyright © 2024 Doctor Appointment All right reserved</p></footer>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="{{mix('js/app.js')}}"></script>
  </body>
  </html>