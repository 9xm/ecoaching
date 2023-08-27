@extends('admin.app')
@section('title', 'Create Batch')
@section('content')
<form action="{{route('admin.batches.store')}}" method="post">
	@csrf
<div class="row">
	<div class="col-md-8 p-4 bg-body-tertiary rounded">
		<h3>Add New Batch <a class="btn btn-outline-primary text-end" href="{{route('admin.batches.index')}}">Back</a></h3>
		<div class="mb-3">
			<label class="form-label">Title</label>
			<input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" value="{{old('title')}}">
			<div class="form-text">Title of the batch.</div>
		</div>
		<div class="row">
			<div class="mb-3 col-md-6">
				<label class="form-label">Batch Start</label>
				<input type="date" class="form-control  @error('batch_start') is-invalid @enderror" name="batch_start" value="{{old('batch_start')}}">
			</div>
			<div class="mb-3  col-md-6">
				<label class="form-label">Batch End</label>
				<input type="date" class="form-control  @error('batch_end') is-invalid @enderror" name="batch_end" value="{{old('batch_end')}}">
			</div>
		</div>
		<div class="mb-3">
			<label class="form-label">Fee</label>
			<input type="text" maxlength="6" class="form-control  @error('fee') is-invalid @enderror" name="fee" value="{{old('fee')}}">
			<div class="form-text">Fee of the batch.</div>
		</div>
		<div class="mb-3">
			<label class="form-label">Description</label>
			<textarea class="form-control @error('description') is-invalid @enderror" name="description"  id="content">{{old('description')}}</textarea>
			<div class="form-text"></div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="position-sticky" style="top: 3rem;">
			<div class="p-4 bg-body-tertiary rounded mb-3 ">
				<div class="mb-3">
					<label class="form-label">Course</label>
					<select class="form-select" name="course_id">
						@foreach($courses as $course )
							<option value="{{$course->id}}"  @if(old('course_id') == $course->id ) selected="selected" @endif>{{$course->title}}</option>
						@endforeach
					</select>
				</div>				
				<div class="mb-3">
					<label class="form-label">Status</label>
					<select class="form-select" name="status">
						<option value="draft"  @if(old('status') == 'draft' ) selected="selected" @endif>Draft</option>
						<option value="publish"  @if(old('status') == 'publish' ) selected="selected" @endif>Publish</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary btn-lg">Save</button>
			</div>
		</div>
	</div>
</div>
</form>

@endsection