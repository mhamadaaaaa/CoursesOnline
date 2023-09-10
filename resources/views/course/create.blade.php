<x-dashboard.dash>
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
    <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('course._form')
        <div class="form-group"style="margin-left: 30px">
            <button type="submit" class="btn btn-primary">save</button>
        </div>
    </form>
</x-dashboard.dash>
<x-dashboard.nav>
</x-dashboard.nav>
<x-dashboard.slider>
</x-dashboard.slider>
