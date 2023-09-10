@props([
    'name' , 'options','checked' => false
])

@foreach($options   as  $value => $text)
<div class="custom-control custom-radio">
    
    <input type="radio" id="customRadio1" name="{{$name}}" class="custom-control-input"value="{{$value}}"@checked(old($name,$checked) == $value)
    {{$attributes}}>
    <label class="custom-control-label" for="customRadio1">{{$text}}</label>
  </div>
@endforeach
