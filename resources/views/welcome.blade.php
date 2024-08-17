<x-layout>
    <form class="d-flex" style="gap: 10px;" method="GET" action="/" role="search">
        <input class="form-control" type="search" placeholder="Search" value="{{isset($q)?$q:''}}" name="q" aria-label="Search">
        <select class="form-select w-25" aria-label="Default select example" name="q_category">
            @if(isset($category))
                <option value="">All</option>
                <option value="doctor" {{$category == "doctor"?"selected":""}}>Doctor</option>
                <option value="department" {{$category == "department"?"selected":""}}>Department</option>
                <option value="date" {{$category == "date"?"selected":""}}>Date</option>
                <option value="appointment_number" {{$category == "appointment_number"?"selected":""}}>Appointment Number</option>
                <option value="patient_name" {{$category == "patient_name"?"selected":""}}>Patient Name</option>
                <option value="patient_phone" {{$category == "patient_phone"?"selected":""}}>Patient Phone</option>
                <option value="total_fee" {{$category == "total_fee"?"selected":""}}>Total Fee</option>
                <option value="paid_amount" {{$category == "paid_amount"?"selected":""}}>Paid Amount</option>
                <option value="check" {{$category == "check"?"selected":""}}>Check</option>
                <option value="uncheck" {{$category == "uncheck"?"selected":""}}>Uncheck</option>
            @else
                <option value="" selected>All</option>
                <option value="doctor">Doctor</option>
                <option value="department">Department</option>
                <option value="date">Date</option>
                <option value="appointment_number">Appointment Number</option>
                <option value="patient_name">Patient Name</option>
                <option value="patient_phone">Patient Phone</option>
                <option value="total_fee">Total Fee</option>
                <option value="paid_amount">Paid Amount</option>
                @if(isset($category))
                <option value="check" {{$category == "check"?"selected":""}}>Check</option>
                <option value="uncheck" {{$category == "uncheck"?"selected":""}}>Uncheck</option>
                @else
                <option value="check" >Check</option>
                <option value="uncheck" >Uncheck</option>
                @endif
            @endif
        </select>
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <x-appointments.Table :appointments="$appointments"/>
    <div>
        {{$appointments->withQueryString()->links()}}
    </div>
</x-layout>
