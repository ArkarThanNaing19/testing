<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5.3 - Form Validation</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


<div class="container">
	<h2>Update Form</h2>

@foreach($sel as $s)

	<form method="POST" action="/update/{{ $s->id }}">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
					<label for="username">Username:</label>
					<input type="text" id="username" name="username" class="form-control" placeholder="Enter Username" value="{{ $s->username }}">
					<span class="text-danger"></span>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('profile_name') ? 'has-error' : '' }}">
					<label for="profile_name">Profile Name:</label>
					<input type="text" id="profile_name" name="profile_name" class="form-control" placeholder="Enter Profile Name" value="{{ $s->profile_name }}">
					<span class="text-danger"></span>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					<label for="email">Email:</label>
					<input type="text" id="email" name="email" class="form-control" placeholder="Enter Email" value="{{ $s->email }}">
					<span class="text-danger"></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
					<label for="phone">Phone No:</label>
					<input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Phone Number" value="{{ $s->phone }}">
					<span class="text-danger"></span>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" value="{{ $s->password }}" >
					<span class="text-danger"></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('confirm_pass') ? 'has-error' : '' }}">
					<label for="confirm_pass">Confirm Pass:</label>

 
					<input type="password" id="confirm_pass" name="confirm_pass" class="form-control" placeholder="Enter Confirm Passowrd">
					<span class="text-danger"></span>
				</div>
			</div>
		</div>

		<div class="form-group">
			<button class="btn btn-success">Submit</button>
		</div>

@endforeach
	</form>

	
</div>

<div class="container">
	<div class="jumbotron text-center">
		<h4><a href="/list">To go Users List.</a></h4>
	</div>
</div>


</body>
</html>