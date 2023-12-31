@extends('site.app')
@section('title', 'Courses')
@section('content')
	
<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Album example</h1>
        <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($courses as $course)
        <div class="col">
          <div class="card shadow-sm">
            <img src="{{asset($course->image)}}" width="100%" height="225" />
            <div class="card-body">
              <p class="card-text">{{$course->title}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{route('course', ['id'=> $course->id])}}" class="btn btn-sm btn-outline-secondary">View</a>
                </div>
                <small class="text-body-secondary">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
    </div>
  </div>

</main>
@endsection