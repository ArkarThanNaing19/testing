<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5.3 - Form Validation</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


<div class="container">
	<h2>Form Validation</h2>
	<form method="POST" action="/form-validation">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="row">
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
					<label for="firstname">First Name:</label>
					<input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter First Name" value="{{ old('firstname') }}">
					<span class="text-danger">{{ $errors->first('firstname') }}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
					<label for="lastname">Last Name:</label>
					<input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter Last Name" value="{{ old('lastname') }}">
					<span class="text-danger">{{ $errors->first('lastname') }}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
					<label for="username">Username:</label>
					<input type="text" id="username" name="username" class="form-control" placeholder="Enter Username" value="{{ old('username') }}">
					<span class="text-danger">{{ $errors->first('username') }}</span>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					<label for="email">Email:</label>
					<input type="text" id="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
					<span class="text-danger">{{ $errors->first('email') }}</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
					<label for="phone">Phone No:</label>
					<input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Phone Number" value="{{ old('phone') }}">
					<span class="text-danger">{{ $errors->first('phone') }}</span>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" >
					<span class="text-danger">{{ $errors->first('password') }}</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('confirm_pass') ? 'has-error' : '' }}">
					<label for="confirm_pass">Confirm Pass:</label>

 
					<input type="password" id="confirm_pass" name="confirm_pass" class="form-control" placeholder="Enter Confirm Passowrd">
					<span class="text-danger">{{ $errors->first('confirm_pass') }}</span>
				</div>
			</div>
		</div>



		<div class="form-group">
			<button class="btn btn-success">Submit</button>
		</div>


	</form>

	@if(count($errors))
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
</div>


</body>
</html>