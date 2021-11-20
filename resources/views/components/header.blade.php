<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>UserData</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">DATAZOO</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0 py-2">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="/">Home</a>
					</li>
					@if(Session::get('name'))
						<li class="nav-item">
							<a class="nav-link active" href="/create">AddData</a>
						</li>
					@endif
				</ul>
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0 py-2">
					<form class="d-flex" action="/search" method="POST">
						@csrf
						<input class="form-control me-2" name="search" placeholder="Name/Profession" aria-label="Search">
						<button class="btn btn-dark me-5" type="submit" name="submit">Search</button>
					</form>
					@if(Session::get('name'))
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="/logout">Logout</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active text-dark">{{Session::get('name')}}</a>
						</li>
					@else
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="/register">Signup</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="/login">Login</a>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

   