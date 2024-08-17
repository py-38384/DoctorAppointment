@props(['doctor' => []])
<div class="card mb-3" style="width:100%;">
    <div class="row g-0">
        <div class="col-md-2">
            <img src="{{$doctor->photo? asset('storage/'.$doctor->photo):'/doctor_placeholder.svg'}}" class="img-fluid rounded-start" alt="Doctor Photo">
        </div>
        <div class="col-md-9">
            <div class="card-body">
                <h5 class="card-title mb-2">{{$doctor->name}}</h5>
                <div class="card-text"><b>Department: </b>{{$doctor->department->name}}</div>
                <div class="card-text"><b>Phone: </b>{{$doctor->phone}}</div>
                <div class="card-text"><b>Fee: </b>{{$doctor->fee}} TK</div>
            </div>
        </div>
        <div class="col-md-1">
            <a class="d-block btn btn-primary m-2" href="/doctors/{{$doctor->id}}/edit"><i class='bx bxs-edit-alt'></i></a>
            <span data-bs-toggle="modal" data-bs-target="#appointment_delete_modal_{{$doctor->id}}" class="d-block btn btn-danger m-2"><i class='bx bx-trash'></i></span>
        </div>
    </div>
</div>