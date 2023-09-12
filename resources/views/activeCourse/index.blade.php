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
        </div><!-- End Page Title -->


</div>

<x-alert_comp type="success" massege="شكرا لتعاملك معنا " />
<x-alert_comp type="info"  />


<div class="card-body">

    <table id="example2" class="table table-bordered table-hover">

        <thead>
            <tr>
                <th>image</th>
                <th>id</th>
                <th>name</th>
                <th>description</th>
                <th>statuse</th>
                <th>categories_id</th>
                <th>teacher</th>
                <th>crated_at</th>
                <th>active</th>



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
