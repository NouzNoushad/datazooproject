@extends('layout')

@section('content')

<div class="container">
	<div class="row my-5">
		<div class="col-md-7 m-auto">
			<div class="card card-body border-primary">
				<form action="/edit" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row justify-content-center my-4">
						<input type="hidden" name="id" value={{$user->id}}>
						<div class="col-sm-10 text-center">
							<img src="{{asset('storage/images/' . $user->image)}}" alt="" height=200>
						</div>
						<div class="col-sm-10">
							<small>edit uploaded image*</small>
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
								<input type="text" name="name" class="form-control" placeholder="Name" value={{$user->name}}>
							@endif
						</div>
						<div class="col-sm-10 mt-2">
							@if($errors->has('profession'))
								<input type="text" name="profession" class="form-control border-danger" placeholder="Profession">
								<small class="text-danger">@error('profession'){{$message}}@enderror</small>
							@else
								<input type="text" name="profession" class="form-control" placeholder="Profession" value={{$user->profession}}>
							@endif
						</div>
						<div class="col-sm-10 mt-2">
							@if($errors->has('phone'))
								<input type="number" name="phone" class="form-control border-danger" placeholder="Phone">
								<small class="text-danger">@error('phone'){{$message}}@enderror</small>
							@else
								<input type="number" name="phone" class="form-control" placeholder="Phone" value={{$user->phone}}>
							@endif
						</div>
						<div class="col-sm-10 mt-2">
							@if($errors->has('email'))
								<input type="email" name="email" class="form-control border-danger" placeholder="Email">
								<small class="text-danger">@error('email'){{$message}}@enderror</small>
							@else
								<input type="email" name="email" class="form-control" placeholder="Email" value={{$user->email}}>
							@endif
						</div>
						<div class="col-sm-10 mt-2">
							@if($errors->has('address'))
								<textarea name="address" class="form-control border-danger" placeholder="Address"></textarea>
								<small class="text-danger">@error('address'){{$message}}@enderror</small>
							@else
								<textarea name="address" class="form-control" placeholder="Address...">{{$user->address}}</textarea>
							@endif
						</div>
						<div class="col-sm-10 mt-3">
							<button type="submit" name="submit" class="btn btn-primary form-control">EditData</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection