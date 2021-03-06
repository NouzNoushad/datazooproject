@extends('layout')

@section('content')

<div class="container">
	<div class="row mt-4">
		<div class="col-md-6 m-auto">
			<div class="card card-body border-primary">
				<form action="/register" method="POST">
					@csrf
					<div class="row justify-content-center mt-4">
						<div class="col-sm-10">
							@if($errors->has('name'))
								<input type="text" name="name" class="form-control border-danger" placeholder="Username">
								<small class="text-danger">@error('name'){{$message}}@enderror</small>
							@else
								<input type="text" name="name" class="form-control" placeholder="Username" value={{old('name')}}>
							@endif
						</div>
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
						<div class="col-sm-10 mt-2">
							@if($errors->has('password_confirmation'))
								<input type="password" name="password_confirmation" class="form-control border-danger" placeholder="Confirm Password">
								<small class="text-danger">@error('password_confrimation'){{$message}}@enderror</small>
							@else
								<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" value={{old('password_confirmation')}}>
							@endif
						</div>
						<div class="col-sm-10 mt-3">
							<button type="submit" name="submit" class="btn btn-primary form-control">SignUp</button>
						</div>
						<div class="col-sm-10 mt-2 mb-2">
							<p class="lead">Have an Account? <a href="/login">Login</a></p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection