@extends('admin.app')
@section('title', 'Course Listing')
@section('content')
<div class="row">
	<div class="col-md-12 p-4 bg-body-tertiary rounded">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Courses</li>
      </ol>
    </nav>
    <h2>Courses <a class="btn btn-outline-primary text-end" href="{{route('admin.courses.create')}}">Add New</a></h2>
    <table class="table table-sm table-bordered">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Handle</th>
          </tr>
          </thead>
          <tbody>
            @foreach($courses as $course)
          <tr>
            <th scope="row">{{$course->id}}</th>
            <td style="width:60px"><img src="{{asset($course->image)}}" class="w-100" /></td>
            <td>{{$course->title}}</td>
            <td>{{$course->status}}</td>
            <td><a href="{{route('admin.courses.edit', ['course'=>$course->id])}}">edit</a></td>
          </tr>
          @endforeach
         
          </tbody>
        </table>
        <nav>
          
        {{$courses->links('pagination')}}
	</div>
  
</div>	
@endsection