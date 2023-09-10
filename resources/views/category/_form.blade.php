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
    <x-form.enter class="form-controll" name="name" :value="$categories->name " />
    {{-- ?? '' --}}
    {{-- @error('name') is-invalid @enderror --}}
    {{--  --}}
    {{-- <input type="text" name="name" @class(['form-control', 'is-invalid' => $errors->has('name')])class="form-control " value="{{$categories->name }} {{old('name')}}"> --}}
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
    <textarea name="description" class="form-control">{{$categories->description }} {{old('description')}}</textarea>
</div>
<div class="form-group"style="margin-left: 30px">
    <label for="">image</label>
    {{-- <img src="{{asset('storage/'.$categories->image)}}" width="60px" height="60px"> --}}
    @if($categories->image)
        <img src="{{asset('storage/'.$categories->image)}}" width="60px" height="60px">
    @endif
    <input type="file" name="image" class="form-control"  accept="image/*">

</div>
<div class="form-group"style="margin-left: 30px">
    {{-- <label for="">status</label>
    <x-form.radio name="status" :checked="$categories->status" :options="['active' => 'Active']"  />
    <x-form.radio name="status" :checked="$categories->status" :options="['archived' => 'Archived']"  /> --}}


    {{-- <x-form.radio name="status" :checked="$categories->status" value="active"  />
    <x-form.radio name="status" :checked="$categories->status" value="archived"  /> --}}

        <div class="custom-control custom-radio">
            {{--  --}}
           <input type="radio" id="customRadio1" name="status" class="custom-control-input"value='active'@checked(old('status',$categories->status) == 'active')>
            <label class="custom-control-label" for="customRadio1">active</label>
          </div>
          <div class="custom-control custom-radio">
            {{--  --}}
            <input type="radio" id="customRadio2" name="status" class="custom-control-input"value='archived'@checked(old('status',$categories->status) == 'archived')>
            <label class="custom-control-label" for="customRadio2">archived</label>
          </div>
    {{-- </>div --}}
</div>
