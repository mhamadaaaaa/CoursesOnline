

<select

name="{{ $name }}"

{{-- {{ $attributes->class([

    'form-control',

    'form-select',

    'is-invalid' => $errors->has ($name),

]) }} --}}
>
@foreach($options   as  $value => $text)
    <option value="{{ $value }}"  class='form-control' selected($value $selected)>{{ $text }}</option>
@endforeach


</select>

{{-- <x-form.validation-feedback :name="$name" /> --}}