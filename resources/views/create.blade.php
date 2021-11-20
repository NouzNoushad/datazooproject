@extends('layout')

@section('content')

<div class="container">
	<div class="row my-5">
		<div class="col-md-7 m-auto">
			<div class="card card-body border-primary">
				<form action="/create" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row justify-content-center my-4">
						<div class="col-sm-10">
							<small>upload image*</small>
							@if($errors->has('image'))
								<input type="file" name="image" class="form-control border-danger">
								<small class="text-danger">@error('image'){{$message}}@enderror</small>
							@else
								<input type="file" name="image" class="form-control">
							@endif
						</div>
						<div class="col-sm-10 mt-2">
							@if($errors->has('name'))
								<input type="text" name="name" class="form-control border-danger" placeholder="Name">
								<small class="text-danger">@error('name'){{$message}}@enderror</small>
							@else
								<input type="text" name="name" class="form-control" placeholder="Name" value={{old('name')}}>
							@endif
						</div>
						<div class="col-sm-10 mt-2">
							@if($errors->has('profession'))
								<input type="text" name="profession" class="form-control border-danger" placeholder="Profession">
								<small class="text-danger">@error('profession'){{$message}}@enderror</small>
							@else
								<input type="text" name="profession" class="form-control" placeholder="Profession" value={{old('profession')}}>
							@endif
						</div>
						<div class="col-sm-10 mt-2">
							@if($errors->has('phone'))
								<input type="number" name="phone" class="form-control border-danger" placeholder="Phone">
								<small class="text-danger">@error('phone'){{$message}}@enderror</small>
							@else
								<input type="number" name="phone" class="form-control" placeholder="Phone" value={{old('phone')}}>
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
							@if($errors->has('address'))
								<textarea name="address" class="form-control border-danger" placeholder="Address"></textarea>
								<small class="text-danger">@error('address'){{$message}}@enderror</small>
							@else
								<textarea name="address" class="form-control" placeholder="Address...">{{old('address')}}</textarea>
							@endif
						</div>
						<div class="col-sm-10 mt-3">
							<button type="submit" name="submit" class="btn btn-primary form-control">AddData</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection