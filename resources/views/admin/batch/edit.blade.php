@extends('admin.app')
@section('title', 'Edit Batch')
@section('content')


<form action="{{route('admin.batches.update', ['batch'=>$batch->id])}}" method="post"  enctype="multipart/form-data">
	@method('PUT')
	@csrf
<div class="row">
	<div class="col-md-8 p-4 bg-body-tertiary rounded">
		<div class="mb-3">
			<h3>Edit Batch <a class="btn btn-outline-primary text-end" href="{{route('admin.batches.index')}}">Back</a></h3>
		</div>
		<div class="mb-3">
			<label class="form-label">Name</label>
			<input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" value="{{$batch->title}}">
			<div class="form-text">Name of the batch.</div>
		</div>
		<div class="row">
			<label class="form-label">Batch Scheduled</label>
			<div class="mb-3 col-md-6">
				<label class="form-label">Start</label>
				<input type="date" class="form-control  @error('batch_start') is-invalid @enderror" name="batch_start" value="{{$batch->batch_start}}">
			</div>
			<div class="mb-3  col-md-6">
				<label class="form-label">End</label>
				<input type="date" class="form-control  @error('batch_end') is-invalid @enderror" name="batch_end" value="{{$batch->batch_end}}">
			</div>
		</div>
		<div class="mb-3">
			<label class="form-label">Fee</label>
			<input type="text" maxlength="6" class="form-control  @error('fee') is-invalid @enderror" name="fee" value="{{$batch->fee}}">
			<div class="form-text">Fee of the batch.</div>
		</div>
		<div class="mb-3">
			<label class="form-label">Description</label>
			<textarea class="form-control @error('description') is-invalid @enderror" name="description"  id="content">{{$batch->description}}</textarea>
			<div class="form-text"></div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="position-sticky" style="top: 3rem;">
			<div class="p-4 bg-body-tertiary rounded mb-3">
				<div class="mb-3">
					<label class="form-label">Course</label>
					<select class="form-select" name="course_id">
						@foreach($courses as $course )
							<option value="{{$course->id}}"  @if($batch->course_id == $course->id ) selected="selected" @endif>{{$course->title}}</option>
						@endforeach
					</select>
				</div>				

				<div class="mb-3">
					<label class="form-label">Status</label>
					<select class="form-select" name="status">
						<option value="draft"  @if($batch->status == 'draft' ) selected="selected" @endif>Draft</option>
						<option value="publish"  @if($batch->status == 'publish' ) selected="selected" @endif>Publish</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary w-100 btn-lg">Save</button>
			</div>

		
		</div>
	</div>
</div>
</form>
    @endsection