@extends('admin.app')
@section('title', 'Batch Listing')
@section('content')
<div class="row">
	<div class="col-md-12 p-4 bg-body-tertiary rounded">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Batches</li>
      </ol>
    </nav>

    <h2>Batches <a class="btn btn-outline-primary text-end" href="{{route('admin.batches.create')}}">Add New</a></h2>
    <table class="table table-sm table-bordered">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Course</th>
            <th scope="col">Batch Name</th>
            <th scope="col">Start</th>
            <th scope="col">End</th>
            <th scope="col">Handle</th>
          </tr>
          </thead>
          <tbody>
            @foreach($batches as $batch)
          <tr>
            <th scope="row">{{$batch->id}}</th>
            <td>{{$batch->course->title}}</td>
            <td>{{$batch->title}}</td>
            <td>{{$batch->batch_start}}</td>
            <td>{{$batch->batch_end}}</td>
            <td><a href="{{route('admin.batches.edit', ['batch'=>$batch->id])}}">edit</a></td>
          </tr>
          @endforeach
         
          </tbody>
        </table>
        <nav>
          
        {{$batches->links('pagination')}}
	</div>
  
</div>	
@endsection