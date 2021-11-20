@extends('layout')

@section('content')

<div class="container">
	<div class="row my-5">
		<div class="col-md-12 m-auto">
			<div class="card card-body">
				@if(Session::get('status'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<div class="text-center">{{Session::get('status')}}</div>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				@endif
				<div class="row row-cols-1 row-cols-md-5 g-4">
					@foreach($users as $user)
					<div class="col">
						<div class="card h-100">
							<img src="{{asset('storage/images/' . $user->image)}}" class="card-img-top" alt="...">
							<div class="card-body text-center">
								<h5 class="card-title">{{$user->name}}</h5>
								<p class="card-text">{{$user->profession}}</p>
							</div>
							<a href="/moreinfo/{{$user->id}}" class="btn btn-info form-control">More Info</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

@endsection