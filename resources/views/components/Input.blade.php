@props(["label" => "","id" => "","name" => ""])
<div class="mb-3">
    <label for="{{$id}}" class="form-label">{{$label}}</label>
    <input {{$attributes(["class" => "form-control","type" => "text"])}} id="{{$id}}" name="{{$name}}">
    @error($name)
        <div>
          <p class="error-message">{{$message}}</p>
        </div>
    @enderror
</div>