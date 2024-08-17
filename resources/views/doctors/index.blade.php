<x-layout>
    <div class="border-bottom d-flex justify-content-between">
        <h1>Doctors</h1>
        <a class="d-block btn btn-primary m-2" href="/doctors/create"><i class='bx bx-plus' ></i></a>
    </div>
    <div>
        @foreach ($doctors as $doctor)
            <x-Modal 
                id="{{$doctor->id}}" 
                modalTitle="Delete <b>{{$doctor->name}}</b>" 
                modalBody="Are you really want to delete record of doctor <b>{{$doctor->name}}</b>" 
                formAction="/doctors/{{$doctor->id}}"
            />
            <x-doctors.Card :doctor="$doctor" />
        @endforeach
    </div>
    <div>
        {{$doctors->withQueryString()->links()}}
    </div>
</x-layout>
