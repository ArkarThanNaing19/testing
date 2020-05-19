<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Item Validation Form</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <br />
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

            

      <form method="post" action="{{url('items/add')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="itemName">Item Name:</label>
          <input type="text" class="form-control" id="itemName" name="name">
        </div>
        <div class="form-group">
          <label for="price">Price:</label>
          <input type="text" class="form-control" id="price" name="price">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

    @if (\Session::get('success'))
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show mt-5 col-md-4">
              <p>{{ \Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              </p>
            </div>
        </div>
    @endif 

  </body>
</html>