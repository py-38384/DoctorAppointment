<x-layout>
    <div class="border-bottom d-flex justify-content-between">
        <h1>Doctors</h1>
        <a class="d-block btn btn-primary m-2" href="/doctors/create"><i class='bx bx-plus' ></i></a>
    </div>
    <div>
        <x-doctors.ModalsAndCards :doctors="$doctors"/>
    </div>
    <div>
        {{$doctors->withQueryString()->links()}}
    </div>
</x-layout>
