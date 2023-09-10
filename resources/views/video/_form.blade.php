{{-- ملاحضة المز ؟؟ يعني اذا كان المتغير موجود اطبعو ما كان خلي مش موجود --}}

{{-- {{$errors->any()}} --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group" style="margin-left: 30px">
    <label for="">name</label>
    {{--  نقطين : اللي بعديه رح يكون قيمة valuملاحضة لما تلاقي قبل  --}}
    <x-form.enter class="form-controll" name="name" :value="$video->name " />
    {{-- ?? '' --}}
    {{-- @error('name') is-invalid @enderror --}}
    {{--  --}}
    {{-- <input type="text" name="name" @class(['form-control', 'is-invalid' => $errors->has('name')])class="form-control " value="{{$video->name }} {{old('name')}}"> --}}
    {{-- @if($errors->has('name'))
      <p class="text-danger">{{$errors->get('name')[0]}}</p>

     @endif --}}
     {{--  --}}
     {{-- @error('name')
     <div class="text-danger">
        {{$message }}
    </div>
     @enderror --}}


</div>

<div class="form-group"style="margin-left: 30px">
    <label for="">description</label>
    <textarea name="description" class="form-control">{{$video->description }} {{old('description')}}</textarea>
</div>
<div class="form-group "style="margin-left: 30px">
    <label for="">coures_id</label>
    <select name="course_id" class="form-control form-select">
        {{-- @selected($categuri->parant_id,parant_id) --}}
        <option value="" >coures_id</option>
        @foreach ($course as $item)
        {{-- @selected(old('categories_id',$video->categories_id) == $item->id) --}}
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>
<label for="">video</label>
    {{--  نقطين : اللي بعديه رح يكون قيمة valuملاحضة لما تلاقي قبل  --}}
    <x-form.enter class="form-controll" name="video" :value="$video->video " />

{{-- <div class="form-group"style="margin-left: 30px">
    <label for="">image</label>
    <img src="{{asset('storage/'.$video->image)}}" width="60px" height="60px">
    @if($video->image)
        <img src="{{asset('storage/'.$video->image)}}" width="60px" height="60px">
    @endif
    <input type="file" name="image" class="form-control"  accept="image/*">

</div> --}}
{{-- <div class="form-group"style="margin-left: 30px">
    {{-- <label for="">status</label>
    <x-form.radio name="status" :checked="$video->status" :options="['active' => 'Active']"  />
    <x-form.radio name="status" :checked="$video->status" :options="['archived' => 'Archived']"  /> --}}


    {{-- <x-form.radio name="status" :checked="$video->status" value="active"  />
    <x-form.radio name="status" :checked="$video->status" value="archived"  /> --}}

        {{-- <div class="custom-control custom-radio"> --}}
            {{--  --}}
           {{-- <input type="radio" id="customRadio1" name="status" class="custom-control-input"value='active'@checked(old('status',$video->status) == 'active')>
            <label class="custom-control-label" for="customRadio1">active</label>
          </div>
          <div class="custom-control custom-radio"> --}}
            {{--  --}}
            {{-- <input type="radio" id="customRadio2" name="status" class="custom-control-input"value='archived'@checked(old('status',$video->status) == 'archived')>
            <label class="custom-control-label" for="customRadio2">archived</label>
          </div> --}}
    {{-- </>div --}}
{{-- </div> --}}
