@props(['doctors','departments'])
<form method="POST" action="/appointments">
    @csrf
    <x-Input onchange="dateChangeDetector(this)" type="datetime-local" id="appointment-date" name="date" label="Appointment Date" value="{{old('date')}}" required/>

    <x-Select onchange="departmentChangeDetector(this)" aria-label="Default select example" label="Department" id="appointment-department">
      <x-Option value="not-selected" selected>All Departments</x-Option>
      @foreach ($departments as $department)
        <x-Option value="{{$department->id}}">{{$department->name}}</x-Option>
      @endforeach
    </x-Select>
    

    <x-Select class="mb-3" onchange="doctorChangeDetector(this)" aria-label="Default select example" :margin="false" id="appointment-doctor" name="doctor" label="Doctor">
      <x-Option value="not-selected">Select A Doctor</x-Option>
      @foreach ($doctors as $doctor)
        <x-Option value="{{$doctor->id}}">{{$doctor->name}}</x-Option>
      @endforeach
    </x-Select>
    <b class="mb-3 text-success" id="available-indicator" style="display: none;">Available</b>
    <b class="mb-3 text-danger" id="not-available-indicator" style="display: none;">Not Available</b>
    @error('doctor')
        <div>
          <p class="error-message">{{$message}}</p>
        </div>
    @enderror

    <x-Input type="text" id="doctorsFee" placeholder="0" name="Fee" label="Total Fee" disabled/>
    <x-Heading-md>Patient Information</x-Heading>
    <x-Input type="text" id="patient_name" placeholder="jhon joe" name="patient_name" label="Patient Name" value="{{old('patient_name')}}" required/>
    <x-Input type="text" id="patient_phone" value="{{old('patient_phone')}}" placeholder="+8801364948406" name="patient_phone" label="Patient Phone Number" required/>
    <x-Input type="number" placeholder="5000" value="{{old('paid_amount')}}" id="paid_amount" name="paid_amount" label="Paid Amount" required/>
    <x-Primary-Button id="appointment-create-submit-btn" type="submit" class="btn btn-primary">Submit</x-Primary-Button>
</form>