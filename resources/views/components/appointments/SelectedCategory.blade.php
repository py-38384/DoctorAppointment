@props(['category'])
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