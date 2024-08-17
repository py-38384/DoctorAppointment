@props(["formAction","departments","doctor"])
@if (isset($doctor))
    <h1 class="border-bottom">Edit record of {{$doctor->name}}</h1>
    <form method="POST" action="{{$formAction}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <x-Input id="name" name="name" label="Name" value="{{$doctor->name}}" required/>

      <x-Input id="phone" name="phone" label="Phone" value="{{$doctor->phone}}" required/>

      <x-Input type="number" id="fee" name="fee" label="Fee" value="{{$doctor->fee}}" required/>

      <div class="doctor-image"><img src="{{$doctor->photo? asset('storage/'.$doctor->photo):'/doctor_placeholder.svg'}}" alt="Doctor Photo" srcset=""></div>
      @if($doctor->photo)
      <div class="mb-3 mt-3">
          <input type="checkbox" name="removePhoto" id="removePhoto" /> Remove current photo
      </div>
      @endif
      <x-Input type="file" name="photo" id="photo" label="Photo" />
      <x-Select name="department" aria-label="Default select example">
        @foreach ($departments as $department)
            @if ($department->id == $doctor->department->id)
            <x-Option value="{{$department->id}}" selected>{{$department->name}}</x-Option>
            @else
            <x-Option value="{{$department->id}}">{{$department->name}}</x-Option>
            @endif
        @endforeach
      </x-Select>
        <x-Primary-Button type="submit" class="btn btn-primary">Submit</x-Primary-Button>
        <x-Link class="btn btn-light border" style="margin-left: 10px" href="/doctors">Cancel</x-Link>
    </form>
@else
    <h1 class="border-bottom">Create A New Doctor Record</h1>
    <form method="POST" action="{{$formAction}}" enctype="multipart/form-data">
        @csrf

        <x-Input id="name" name="name" label="Name" value="{{old('name')}}" required/>

        <x-Input id="phone" name="phone" label="Phone" value="{{old('phone')}}" required/>

        <x-Input type="number" id="fee" name="fee" label="Fee" value="{{old('phone')}}" required/>
        
        <x-Input type="file" name="photo" id="photo" label="Photo" />
        <x-Select name="department" aria-label="Default select example">
            @foreach ($departments as $department)
                <x-Option value="{{$department->id}}">{{$department->name}}</x-Option>
            @endforeach
        </x-Select>
            <x-Primary-Button type="submit" class="btn btn-primary">Submit</x-Primary-Button>
            <x-Link class="btn btn-light border" style="margin-left: 10px" href="/doctors">Cancel</x-Link>
    </form>
@endif