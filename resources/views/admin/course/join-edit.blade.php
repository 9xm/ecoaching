@extends('admin.app')
@section('title', 'Update Join Course')
@section('content')


<form action="{{route('admin.join.course.edit', ['id'=> $join_course->id])}}" method="post"  enctype="multipart/form-data">
	@method('PUT')
	@csrf
<div class="row">
	<div class="col-md-8 p-4 bg-body-tertiary rounded">
		<div class="mb-3">
			<h3>Edit Join Course <a class="btn btn-outline-primary text-end" href="{{route('admin.join.courses')}}">Back</a></h3>
		</div>
		<div class="mb-3">
			<label class="form-label">User Name</label>
			<input type="text" class="form-control readonly" readonly="readonly"  value="{{$join_course->user->name}}">
		</div>
		<div class="mb-3">
			<label class="form-label">Course Name</label>
			<input type="text" class="form-control readonly" readonly="readonly"  value="{{$join_course->course->title}}">
		</div>
		<div class="mb-3">
			<label class="form-label">Batch Name</label>
			<input type="text" class="form-control readonly" readonly="readonly"  value="{{$join_course->batch->title}} (#BT{{$join_course->batch->id}})">
		</div>
		<div class="mb-3">
			<label class="form-label">Transaction Number</label>
			<input type="text" class="form-control readonly" readonly="readonly"  value="{{$join_course->transaction_number}}">
		</div>
		<div class="mb-3">
			<label class="form-label">Transaction Date</label>
			<input type="text" class="form-control readonly" readonly="readonly"  value="{{$join_course->transaction_date}}">
		</div>
	
	</div>
	<div class="col-md-4">
		<div class="position-sticky" style="top: 3rem;">
			<div class="p-4 bg-body-tertiary rounded mb-3">
						

				<div class="mb-3">
					<label class="form-label">Status</label>
					<select class="form-select" name="status">
						<option value="processed"  @if($join_course->status == 'processed' ) selected="selected" @endif>Processed</option>
						<option value="success"  @if($join_course->status == 'success' ) selected="selected" @endif>Success</option>
						<option value="certificate"  @if($join_course->status == 'certificate' ) selected="selected" @endif>Certificate</option>
						<option value="discarded"  @if($join_course->status == 'discarded' ) selected="selected" @endif>Discarded</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary w-100 btn-lg">Save</button>
			</div>

		
		</div>
	</div>
</div>
</form>
    @endsection