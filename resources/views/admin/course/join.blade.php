@extends('admin.app')
@section('title', 'Join Courses Listing')
@section('content')
<div class="row">
	<div class="col-md-12 p-4 bg-body-tertiary rounded">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Join Courses</li>
      </ol>
    </nav>
    <h2>Join Courses </h2>
    <table class="table table-sm table-bordered">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">User Name</th>
            <th scope="col">Course Name</th>
            <th scope="col">Batch Name</th>
            <th scope="col">Transaction Number</th>
            <th scope="col">Transaction Date</th>
            <th scope="col">Status</th>
            <th scope="col">Handle</th>
          </tr>
          </thead>
          <tbody>
            @foreach($join_courses as $join_course)
          <tr>
            <th scope="row">{{$join_course->id}}</th>
            <td>{{$join_course->user->name}}</td>
            <td>{{$join_course->course->title}}</td>
            <td>{{$join_course->batch->title}} (#BT{{$join_course->batch->id}})</td>
            <td>{{$join_course->transaction_number}}</td>
            <td>{{$join_course->transaction_date}}</td>
            <td>{{$join_course->status}}</td>
            <td><a href="{{route('admin.join.course.edit', ['id'=> $join_course->id])}}">edit</a></td>
          </tr>
          @endforeach
         
          </tbody>
        </table>
        <nav>
          
        {{$join_courses->links('pagination')}}
	</div>
  
</div>	
@endsection