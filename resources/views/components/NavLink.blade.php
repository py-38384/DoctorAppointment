@props(["href" => ""])
<ul class="navbar-nav me-auto mb-2 mb-lg-0 text-light">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-light">
      <li class="nav-item">
        @php
          if($href == ""){
            $classes = request()->is("/")? " text-light": " text-secondary";
          }else{
            $classes = request()->is($href)? " text-light": " text-secondary";
          }
        @endphp
        <a aria-current="page" {{$attributes(["class"=>"nav-link ".$classes])}} href="/{{$href}}">{{$slot}}</a>
      </li>
  </ul>
</ul>