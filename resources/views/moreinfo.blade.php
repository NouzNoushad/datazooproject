@extends('layout')

@section('content')
<div class="container">
	<div class="row my-5">
		<div class="col-md-9 m-auto">
			<div class="card card-body mb-3 border-primary">
			<div class="row g-0 ">
				<div class="col-md-5">
					<img src="{{asset('storage/images/' . $user->image)}}" class="img-fluid rounded-start" alt="...">
				</div>
				<div class="col-md-7">
					<div class="card card-body ms-4">
						<h4 class="card-title">{{$user->name}}</h4>
						<h6 class="card-text">Profession : {{$user->profession}}</h6>
						<h6 class="card-text">Email : {{$user->email}}</h6>
						<h6 class="card-text">Phone : {{$user->phone}}</h6>
						<h6 class="card-text">Address : {{$user->address}}</h6>
					</div>
				</div>
				<span class="text-end">
					@if(Session::get('name'))
						<a href="/edit/{{$user->id}}" class="btn btn-primary mt-2">Edit Data</a>
						<a href="/delete/{{$user->id}}" class="btn btn-danger mt-2">Delete</a>
					@endif
				</span>
			</div>
			</div>
		</div>
	</div>
</div>
@endsection