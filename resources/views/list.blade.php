<!DOCTYPE html>
<html>
<head>
	<title>List</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		th,td{height: 50px;}
		table{background-color: whitesmoke;}
		table,th,td,tr{border:1px solid rgba(0,0,0,0.1);border-radius: 15px;}

	</style>
</head>

<body style="background-color: #cecece;">

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center mb-5 mt-5">User Lists</h3>

				<table class="col-md-12 text-center mt-5">
					<thead>
						<tr>
						<th>No.</th>
						<th>Profile Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Action</th>
						</tr>
					</thead>

					<tbody>

					<?php $i=1; foreach($sel as $s): ?>

						<tr>
							<td>{{$i}}</td>
							<td>{{ $s->profile_name }}</td>
							<td>{{ $s->email }}</td>
							<td>{{ $s->phone }}</td>
							<td>
								<a href="/edit/{{ $s->id }}" class="btn btn-info btn-sm">Edit</a>
								<a href="del/{{ $s->id }}" class="btn btn-danger btn-sm ml-3">X</a>
							</td>
						</tr>

					<?php $i++; endforeach ?>

					</tbody>

				</table>

		</div>
	</div>
		<div class="row" style="margin-top: 120px;">
			<div class="col-md-6 offset-md-3 text-center">
				<div class="jumbotron">
					<h5><a href="/demo">Link To Add New User!</a></h5>
				</div>
			</div>
		</div>
</div>

</body>
</html>