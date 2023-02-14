{{-- <a href="{{ $path }}" {!! count($attributes) ? $column->arrayToAttributes($attributes) : '' !!}>{{ $title }}</a> --}}
{{-- {{dd($row)}} --}}
<div class="dropdown d-inline-block">
    <a class="hidden-arrow text-black-50" type="button" id="dropdownMenuicon" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="bi bi-three-dots-vertical"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuicon">
        <li><a class="dropdown-item" href="#"> <i class="bi bi-person pe-2"></i>Profile</a></li>
        <li><a class="dropdown-item" href="#"> <i class="bi bi-gear pe-2"></i>Settings</a></li>
        <li><a class="dropdown-item" href="#"> <i class="bi bi-box-arrow-right pe-2"></i>Logout</a></li>
    </ul>
</div>
