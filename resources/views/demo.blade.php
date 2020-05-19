<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5.3 - Form Validation</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


<div class="container">
	<h2 style="margin-bottom: 60px;">Form Validation</h2>
	
	<form method="POST" action="/add">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
					<label for="username">Username:</label>
					<span class="text-danger"> {{ $errors->first('username') }} </span>
					<input type="text" id="username" name="username" class="form-control" placeholder="Enter Username" value="{{ old('username') }}">
					<span class="text-danger"></span>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('profile_name') ? 'has-error' : '' }}">
					<label for="profile_name">Profile Name:</label>
					<span class="text-danger"> {{ $errors->first('profile_name') }} </span>
					<input type="text" id="profile_name" name="profile_name" class="form-control" placeholder="Enter Profile Name" value="{{ old('profile_name') }}">
					<span class="text-danger"></span>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					<label for="email">Email:</label>
					<span class="text-danger"> {{ $errors->first('email') }} </span>
					<input type="text" id="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
					<span class="text-danger"></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
					<label for="phone">Phone No:</label>
					<span class="text-danger"> {{ $errors->first('phone') }} </span>
					<input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Phone Number" value="{{ old('phone') }}">
					<span class="text-danger"></span>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					<label for="password">Password:</label>
					<span class="text-danger"> {{ $errors->first('password') }} </span>
					<input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" >
					<span class="text-danger"></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('confirm_pass') ? 'has-error' : '' }}">
					<label for="confirm_pass">Confirm Pass:</label>
					<span class="text-danger"> {{ $errors->first('confirm_pass') }} </span>
					<input type="password" id="confirm_pass" name="confirm_pass" class="form-control" placeholder="Enter Confirm Passowrd">
					<span class="text-danger"></span>
				</div>
			</div>
		</div>

		<div class="form-group">
			<button class="btn btn-success">Submit</button>
			@if (\Session::get('msg'))
				<span class="text-success">{{ \Session::get('msg') }} </span>
			@endif
		</div>

	</form>
		
</div>

<div class="container">
	<div class="jumbotron text-center">
		<h4><a href="list">To go Users List.</a></h4>
	</div>
</div>

</body>
</html>