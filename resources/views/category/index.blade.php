<x-dashboard.dash>
    {{-- /////////////////////////// --}}
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Dashboard</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </nav>
        </div>
    <!-- End Page Title -->
    {{-- ////////////////////////////// --}}
    {{-- /////////////////////////////// --}}
    <a href="{{route('category.create')}}" class="btn btn-sm btn-outline-success mr-2" style="margin-left: 30px">create</a>
    {{-- @endif --}}
    <a href="{{route('category.trash')}}" class="btn btn-sm btn-outline-dark mr-2" style="margin-left: 30px">trash</a>
    {{-- <a href="/trash" class="btn btn-sm btn-outline-dark mr-2" style="margin-left: 30px">trash</a> --}}

</div>
{{-- @if(session()->has('success'))
<div class="alert alert-success">
{{session('success')}}
</div>
@endif --}}
{{-- -------- --}}
{{-- @if(session()->has('info'))
<div class="alert alert-danger">
{{session('info')}}
</div>
@endif --}}
{{-- {{session('success')}} --}}
{{-- <x-alert_comp  /> --}}
<x-alert_comp type="success" massege="شكرا لتعاملك معنا " />
<x-alert_comp type="info"  />


<div class="card-body">
    {{-- <form action="{{URL::current()}}" method="get" class="d-flex justify-content-between mb-4">
        <x-form.enter class="form-controll" name="name" :value="request('name')"  type="text" placeholder="sershe" />
            <select name="status" class="form-control">
            <option value="">All</option>
            <option value="active" @selected(request('status') == 'active')>Active</option>
            <option value="archived"@selected(request('status') == 'active')>Archived</option>
            </select>
            <button class="btn btn-dark">Filter</button>

    </form> --}}
    <table id="example2" class="table table-bordered table-hover">

        <thead>
            <tr>
                <th>image</th>
                <th>id</th>
                <th>name</th>
                 <th>description</th>
                <th>statuse</th>
                <th>created-at</th>
                <th>edit</th>
                <th>deleate</th>

            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($categuri as $item) --}}
            @forelse ($categories as $item)


            <tr>
                <td><img src="{{asset('storage/'.$item->image)}}" width="60px" height="60px">
                    <a href="{{asset('storage/'.$item->image)}}">اقر هنا</a>
                </td>
                <td>{{$item->id}}</td>
                <td><a href="{{route('category.show' ,[$item->id])}}">{{$item->name}}</a></td>
                {{-- <td>{{$item->parant ? $item->parant->name: '' }}</td> --}}

                <td>{{$item->description}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->created_at}}</td>

                <td>
                    {{-- @if(Auth::user()->can('categories.update')) --}}
                    <a href="{{route('category.edit',[$item->id])}}" class="btn btn-sm btn-outline-success">update</a>
                    {{-- @endif --}}

                </td>
                <td>
                    {{-- @can('categories.delete') --}}
                    <form action="{{route('category.destroy',[$item->id])}}" method="post">
                        @csrf
                        {{-- <input type="hidden" name="_method" value="delete"> --}}
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">deleate</button>
                    </form>
                    {{-- @endcan --}}
                </td>
            </tr>
            @empty
                <tr calspan='7'>
                    no categ defind
                </tr>
            @endforelse
        </tbody>

    </table>
    {{-- //////////////////////////////// --}}
</x-dashboard.dash>
<x-dashboard.nav>
</x-dashboard.nav>
<x-dashboard.slider>
</x-dashboard.slider>
