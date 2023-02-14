<button {!! count($attributes) ? $column->arrayToAttributes($attributes) : '' !!}>{{ $title }}</button>
{{-- {{dd(json_encode(["user" => $row->id]))}} --}}
{{-- <button onclick='livewire.emitTo("user-crud", "edit", {{ $row->id }})'>Edit</button> --}}