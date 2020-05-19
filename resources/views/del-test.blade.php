<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>



<div class="container" style="margin-top : 20px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">


                  <span class="text-success">  <?= (isset($msg)) ? $msg : '' ; ?></span>



                <div id="form" style="border : 1px solid rgba(0,0,0,0.2);padding : 35px;background-color : whitesmoke">
                  <form method="post" action="/form_test">

                    {{ csrf_field() }}

                    <div class="form-group row">
                      <label for="username" class="col-3">Username : </label>
                      <input class="form-control col-5" type="text" id="username" name="username">
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-3">Email : </label>
                      <input class="form-control col-5" type="email" id="email" name="email">
                    </div>

                      <button type="submit" class="btn btn-info float-right">Add</button>

                      <div class="clearfix"></div>

                  </form>
                </div>

                <div class="panel-heading mt-5">All Users</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                    	<thead>
                    		<tr>
	                    		<th>Username</th>
	                    		<th>Email</th>
	                    		<th>Action</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                            @foreach($posts as $key => $value)
                                <tr>
                                    <td>{!! $value->username !!}</td>
                                    <td>{!! $value->email !!}</td>
                                    <td>
                                        <a class="btn btn-danger waves-effect waves-light remove-record" data-toggle="modal" data-url="{!! URL::route('post-delete', $value->id) !!}" data-id="{{$value->id}}" data-target="#custom-width-modal">Delete</a>

                                        <a class="btn btn-primary edit-record" data-toggle="modal"
                                        data-url="{!! URL::route('post-edit', $value->id) !!}"
                                         data-id="{{$value->id}}" data-target = "#custom-width-modal-edit">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Delete Model -->
<form action="" method="POST" class="remove-record-model">
    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h4>Do You Want To Delete This Record?</h4>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Yes</button>
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Edit Model -->
<form action="" method="POST" class="edit-record-model">
    <div id="custom-width-modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center">Update Form</h4>
                    <input type="text" class="form-control mt-3" name="name" placeholder="Username">
                    <input type="email" class="form-control mt-3" name="email" placeholder="Email">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>

$(document).ready(function(){
	// For A Delete Record Popup
	$('.remove-record').click(function() {
		var id = $(this).attr('data-id');
		var url = $(this).attr('data-url');
		// var token = CSRF_TOKEN;
		$(".remove-record-model").attr("action",url);
		$('body').find('.remove-record-model').append('{{ csrf_field() }}');
		$('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
		$('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
	});

	$('.remove-data-from-delete-form').click(function() {
		$('body').find('.remove-record-model').find( "input" ).remove();
	});
	$('.modal').click(function() {
		// $('body').find('.remove-record-model').find( "input" ).remove();
	});
});


</script>

<script>

$(document).ready(function(){
	// For A Delete Record Popup
	$('.edit-record').click(function() {
		var id = $(this).attr('data-id');
  	var url = $(this).attr('data-url');

		// var token = CSRF_TOKEN;
		$(".edit-record-model").attr("action",url);
		$('body').find('.edit-record-model').append('{{ csrf_field() }}');
		$('body').find('.edit-record-model').append('<input name="_method" type="hidden" value="post">');
		$('body').find('.edit-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
	});

	$('.edit-data-from-delete-form').click(function() {
		$('body').find('.edit-record-model').find( "input" ).remove();
	});
	$('.modal').click(function() {
		// $('body').find('.remove-record-model').find( "input" ).remove();
	});
});


</script>


  </body>
</html>
