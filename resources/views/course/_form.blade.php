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
    <x-form.enter class="form-controll" name="name" :value="$courses->name " />
    {{-- ?? '' --}}
    {{-- @error('name') is-invalid @enderror --}}
    {{--  --}}
    {{-- <input type="text" name="name" @class(['form-control', 'is-invalid' => $errors->has('name')])class="form-control " value="{{$courses->name }} {{old('name')}}"> --}}
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
    <textarea name="description" class="form-control">{{$courses->description }} {{old('description')}}</textarea>
</div>
<div class="form-group "style="margin-left: 30px">
    <label for="">categories_id</label>
    <select name="categories_id" class="form-control form-select">
        {{-- @selected($categuri->parant_id,parant_id) --}}
        <option value="" >categories_id</option>
        @foreach ($category as $item)
        {{-- @selected(old('categories_id',$courses->categories_id) == $item->id) --}}
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group "style="margin-left: 30px">
    <label for="">teacher_id</label>
    <select name="teacher_id" class="form-control form-select">
        {{-- @selected($categuri->parant_id,parant_id) --}}
        <option value="" >teacher_id</option>
        @foreach ($user as $item)
        {{-- @selected(old('categories_id',$courses->categories_id) == $item->id) --}}
        <option value="{{$item->id}}">{{Auth::user()->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group"style="margin-left: 30px">
    <label for="">image</label>
    {{-- <img src="{{asset('storage/'.$courses->image)}}" width="60px" height="60px"> --}}
    @if($courses->image)
        <img src="{{asset('storage/'.$courses->image)}}" width="60px" height="60px">
    @endif
    <input type="file" name="image" class="form-control"  accept="image/*">

</div>
<div class="form-group"style="margin-left: 30px">
    {{-- <label for="">status</label>
    <x-form.radio name="status" :checked="$courses->status" :options="['active' => 'Active']"  />
    <x-form.radio name="status" :checked="$courses->status" :options="['archived' => 'Archived']"  /> --}}


    {{-- <x-form.radio name="status" :checked="$courses->status" value="active"  />
    <x-form.radio name="status" :checked="$courses->status" value="archived"  /> --}}

        <div class="custom-control custom-radio">
            {{--  --}}
           <input type="radio" id="customRadio1" name="status" class="custom-control-input"value='active'@checked(old('status',$courses->status) == 'active')>
            <label class="custom-control-label" for="customRadio1">active</label>
          </div>
          <div class="custom-control custom-radio">
            {{--  --}}
            <input type="radio" id="customRadio2" name="status" class="custom-control-input"value='archived'@checked(old('status',$courses->status) == 'archived')>
            <label class="custom-control-label" for="customRadio2">archived</label>
          </div>
    {{-- </>div --}}
</div>
