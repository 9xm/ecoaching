@extends('admin.app')
@section('title', 'Edit User')
@section('content')


<form action="{{route('admin.users.update', ['user'=>$user->id])}}" method="post"  enctype="multipart/form-data">
	@method('PUT')
	@csrf
<div class="row">
	<div class="col-md-8 p-4 bg-body-tertiary rounded">
		<div class="mb-3">
			<h3>Edit User <a class="btn btn-outline-primary text-end" href="{{route('admin.users.index')}}">Back</a></h3>
		</div>
		<div class="mb-3">
			<label class="form-label">Name</label>
			<input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{$user->name}}">
			<div class="form-text">Name of the user.</div>
		</div>
		<div class="mb-3">
			<label class="form-label">Email</label>
			<input type="text" class="form-control" readonly value="{{$user->email}}">
			<div class="form-text">User email not editable</div>
		</div>
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Summary</label>
			<textarea class="form-control @error('summary') is-invalid @enderror" name="summary"  id="content">{{$user->summary}}</textarea>
			<div class="form-text"></div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="position-sticky" style="top: 3rem;">
			<div class="p-4 bg-body-tertiary rounded mb-3">
				@if(auth()->user()->id != $user->id)
				<div class="mb-3">
					<label class="form-label">Role</label>
					<select class="form-select" name="role">
						<option value="subscriber"  @if($user->role == 'subscriber' ) selected="selected" @endif>Subscriber</option>
						<option value="editor"  @if($user->role == 'editor' ) selected="selected" @endif>Editor</option>
						<option value="admin"  @if($user->role == 'admin' ) selected="selected" @endif>Admin</option>
					</select>
				</div>
				@endif
				<button type="submit" class="btn btn-primary w-100 btn-lg">Save</button>
			</div>

			<div class="card p-4">
				<div class="mb-3 d-block">
					<label class="form-label"  for="selectImage">Upload Image <span role="button" ><svg class="bi mx-auto"  width="24" height="18"><use xlink:href="#bi-upload"></use></svg></span></label>
					<input type="hidden" name="image_trash" id="image_trash" value="">
					<input type="file" class="form-control d-none" name="image" accept="image/*" id="selectImage">
					<div id="preview-image" class="@if(!$user->image)d-none @endif position-relative">
						<svg id="preview-image-trash" role="button"  class="bi mx-auto position-absolute end-0 text-danger bg-light" width="26" height="20"><use xlink:href="#bi-trash"></use></svg>
						<img  src="{{asset($user->image)}}" class="w-100" alt="your image" class="mt-3"/>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<script type="text/javascript">      
jQuery(document).ready(function (e) {
	$("#preview-image-trash").click(function(){
		$('#preview-image').addClass('d-none');
      	$('#preview-image img').attr('src', ''); 
		$("#selectImage").val("");

		$("#image_trash").val("true");

	});
   $('#selectImage').change(function(){
    let reader = new FileReader();
	
    reader.onload = (e) => { 
		$('#preview-image').removeClass('d-none');
      	$('#preview-image img').attr('src', e.target.result); 
		  $("#image_trash").val("");
    }
    reader.readAsDataURL(this.files[0]); 

   });
});
</script>
    @endsection