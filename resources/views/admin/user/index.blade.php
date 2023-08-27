@extends('admin.app')
@section('title', 'User Listing')
@section('content')
<div class="row">
	<div class="col-md-12 p-4 bg-body-tertiary rounded">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
      </ol>
    </nav>
    <h2>Users</h2>
    <table class="table table-sm table-bordered">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Handle</th>
          </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td style="width:60px"><img src="{{asset($user->image)}}" class="w-100" /></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td><a href="{{route('admin.users.edit', ['user'=>$user->id])}}">edit</a></td>
          </tr>
          @endforeach
         
          </tbody>
        </table>
        <nav>
          
        {{$users->links('pagination')}}
	</div>
  
</div>	
@endsection