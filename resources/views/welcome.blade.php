<x-layout>
    <form class="d-flex" style="gap: 10px;" method="GET" action="/" role="search">
        <input class="form-control" type="search" placeholder="Search" value="{{isset($q)?$q:''}}" name="q" aria-label="Search">
        <select class="form-select w-25" aria-label="Default select example" name="q_category">
            @if(isset($category))
                <x-appointments.SelectedCategory :category="$category"/>
            @else
                <x-appointments.Category/>
            @endif
        </select>
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    @if(isset($appointments))
        <x-appointments.Table :appointments="$appointments"/>
    @else
        <x-appointments.Table :appointments="[]"/>
    @endif
    <div>
        @if(isset($appointments))
            {{$appointments->withQueryString()->links()}}
        @endif
    </div>
</x-layout>
