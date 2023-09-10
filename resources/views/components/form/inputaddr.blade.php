@props([
    'type', 'name', 'value'
])

<input type="{{$type ?? 'text'}}" name="{{$name}}" @class(['form-control', 'is-invalid' => $errors->has($name)])class="form-control "  value="{{ $value }} {{old($name)}}"
{{$attributes->class([
    'form-contoll'
])}}>
    {{-- @if($errors->has('name'))
      <p class="text-danger">{{$errors->get('name')[0]}}</p>
     
     @endif --}}
     @error($name)
     <div class="text-danger">
        {{$message }}
    </div>
     @enderror