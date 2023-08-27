@extends('site.app')
@section('title', 'Join Course')
@section('content')
<div class="row">
	<div class="col-md-8 p-4 bg-body-tertiary rounded">
		<h3>Join Course: {{$course->title}}</h3>
		<div class="mb-3">
			{!!$course->content!!}
		</div>
		<div class="mb-3">
			<table class="table table-sm table-bordered">
			<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Batch Name</th>
				<th scope="col">Batch Start</th>
				<th scope="col">Fee</th>
			</tr>
			</thead>
			<tbody>
				@foreach($course->batches as $batch)
					<tr>
						<th scope="row">#BAT{{$batch->id}}</th>
						<td>{{$batch->title}}</td>
						<td>{{$batch->batch_start}}</td>
						<td>{{$batch->fee}}</td>
					</tr>
				@endforeach
			</tbody>
			</table>			
		</div>
	</div>
	<div class="col-md-4">
		<div class="position-sticky" style="top: 3rem;">
		@if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
			<form action="{{route('join.course.store')}}" method="post">
			@csrf
			<input type="hidden" name="course_id" value="{{$course->id}}" />
			<div class="p-4 bg-body-tertiary rounded mb-3 ">
				<div class="mb-3">
					<label class="form-label">Batch</label>
					<select class="form-select @error('batch_id') is-invalid @enderror" name="batch_id">
						<option value="" >select</option>
						@foreach($course->batches as $batch)
							<option value="{{$batch->id}}"  @if(old('batch_id') == $batch->id ) selected="selected" @endif>{{$batch->title}} - [#BAT{{$batch->id}}]</option>
						@endforeach
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">UPI Transaction Number</label>
					<input type="text" class="form-control @error('transaction_number') is-invalid @enderror" name="transaction_number" value="{{old('transaction_number')}}" />
				</div>
				<div class="mb-3">
					<label class="form-label">Transaction Date</label>
					<input type="date" class="form-control @error('transaction_date') is-invalid @enderror" name="transaction_date"  value="{{old('transaction_date')}}"  />
				</div>
				<button type="submit" class="btn btn-primary btn-lg">Join Now</button>
			</div>
		</div>
		</form>

	</div>
</div>
@endsection