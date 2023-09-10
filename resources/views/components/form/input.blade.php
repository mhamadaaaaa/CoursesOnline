@props([
    'type', 'name', 'value'
])

<label>{{$name}}</label>
<input type="{{$type ?? 'text'}}" name="{{$name}}" @class(['form-control', 'is-invalid' => $errors->has($name)])class="form-control "  value="{{ $value }}
{{$attributes->class([
    'form-contoll'
])}}>