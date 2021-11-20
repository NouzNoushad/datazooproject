@extends('layout')

@section('content')

<div class="container">
	<div class="row mt-4">
		<div class="col-md-5 m-auto">
			<div class="card card-body border-primary">
				<form action="/login" method="POST">
					@csrf
					@if(Session::get('status'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<div class="text-center">{{Session::get('status')}}</div>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif
					<div class="row justify-content-center mt-4">
						<div class="col-sm-10 mt-2">
							@if($errors->has('email'))
								<input type="email" name="email" class="form-control border-danger" placeholder="Email">
								<small class="text-danger">@error('email'){{$message}}@enderror</small>
							@else
								<input type="email" name="email" class="form-control" placeholder="Email" value={{old('email')}}>
							@endif
						</div>
						<div class="col-sm-10 mt-2">
							@if($errors->has('password'))
								<input type="password" name="password" class="form-control border-danger" placeholder="Password">
								<small class="text-danger">@error('password'){{$message}}@enderror</small>
							@else
								<input type="password" name="password" class="form-control" placeholder="Password" value={{old('password')}}>
							@endif
						</div>
						<div class="col-sm-10 mt-3">
							<button type="submit" name="submit" class="btn btn-primary form-control">Login</button>
						</div>
						<div class="col-sm-10 mt-2 mb-2">
							<p class="lead">Don't Have an Account? <a href="/register">SignUp</a></p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection