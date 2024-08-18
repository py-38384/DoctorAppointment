@props(['appointments' => []])
<div {{$attributes(["class" => "mt-2"])}}>
    @if(count($appointments)>0)
    <x-appointments.Modals :appointments="$appointments"/>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <x-appointments.Ths/>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)    
            <tr style="{{$appointment->check?'text-decoration: line-through;background:gray; color:white':''}}">
                <x-appointments.Tds :appointment="$appointment"/>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h1>No record found</h1>
    @endif
</div>