{{-- @if(session()->has('success'))
<div class="alert alert-success">
{{session('success')}}
</div>
@endif  --}}
{{-- -------- --}}
 {{-- @if(session()->has('info'))
<div class="alert alert-danger">
{{session('info')}}
</div>
@endif --}}

@if(session()->has($type))
<div class="alert alert-{{$type}}">
{{ session($type) }}
</div>
@endif