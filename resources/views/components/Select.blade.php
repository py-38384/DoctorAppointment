@props(["id" => "","label" => "", "margin" => true])
@if($label != "")
<label for="{{$id}}" class="form-label">{{$label}}</label>
@endif
@php
    $m = "";
    if ($margin) {
        $m = "mb-3";
    }
@endphp
<select {{$attributes(["class" => "form-select w-25 ".$m])}} id="{{$id}}">
    {{$slot}}
</select>