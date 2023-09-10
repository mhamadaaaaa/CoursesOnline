<x-dashboard.dash>
    <main id="main" class="main">
        {{-- <div class="pagetitle">
          <h1>Dashboard</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </nav>
        </div><!-- End Page Title --> --}}
    <x-slot:pagetitle>
        <div class="pagetitle">
            <h1>trash</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </nav>
          </div>
          <!-- End Page Title -->
        </x-slot:pagetitle>



{{-- {{route('ctg.trash')}} --}}
<div class="mb-5">
    <a href="{{route('course.index')}}" class="btn btn-sm btn-outline-success mr-2" style="margin-left: 30px">Backe</a>

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
    <form action="{{URL::current()}}" method="get" class="d-flex justify-content-between mb-4">
        <x-form.enter class="form-controll" name="name" :value="request('name')"  type="text" placeholder="sershe" />
            <select name="status" class="form-control">
            <option value="">All</option>
            <option value="active" @selected(request('status') == 'active')>Active</option>
            <option value="archived"@selected(request('status') == 'active')>Archived</option>
            </select>
            <button class="btn btn-dark">Filter</button>

    </form>
    <table id="example2" class="table table-bordered table-hover">

        <thead>
            <tr>
                <th>image</th>
                <th>id</th>
                <th>name</th>
                <th>description</th>
                <th>statuse</th>
                <th>categories_id</th>
                <th>teacher_id</th>
                <th>created-at</th>
                <th>edit</th>
                <th>deleate</th>

            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($categuri as $item) --}}
            @forelse ($courses as $item)


            <tr>
                <td><img src="{{asset('storage/'.$item->image)}}" width="60px" height="60px">
                    <a href="{{asset('storage/'.$item->image)}}">اقر هنا</a>
                </td>
                <td>{{$item->id}}</td>
                <td><a href="{{route('course.show' ,[$item->id])}}">{{$item->name}}</a></td>
                {{-- <td>{{$item->parant ? $item->parant->name: '' }}</td> --}}

                <td>{{$item->description}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->categories_id}}</td>
                <td>{{$item->teacher_id}}</td>
                <td>{{$item->created_at}}</td>
                <td>
                    <form action="{{route('coures.restore',[$item->id])}}" method="post">
                        @csrf
                        {{-- <input type="hidden" name="_method" value="delete"> --}}
                        @method('put')
                        <button type="submit" class="btn btn-sm btn-outline-dark">restore</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('coures.forcedeleate',[$item->id])}}" method="post">
                        @csrf
                        {{-- <input type="hidden" name="_method" value="delete"> --}}
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">deleate</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr calspan='7'>
                    no categ defind
                </tr>
            @endforelse
        </tbody>

    </table>
    {{-- {{$categuri->withQueryString()->links('pagen.pagination')}} --}}
    {{-- {{$categories->withQueryString()->links()}} --}}
</x-dashboard.dash>
<x-dashboard.nav>
</x-dashboard.nav>
<x-dashboard.slider>
</x-dashboard.slider>



