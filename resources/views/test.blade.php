<!DOCTYPE html>
<html>
<head>
	<title>This is Test.</title>
</head>
<body>

<form method = "post" action="/form">
   {{ csrf_field() }}

   <label> Email :</label><br/>
   <input type = "text" name = "name" placeholder="Your Name" />
   <br/><br/>

   <label> Message :</label><br/>
   <input type = "password" name = "password" placeholder="Your Password" />
   <br/><br/>

   <button type = "submit" name = "submitButton" value ="submit">Submit</button>
</form>



<?= (isset($msg)) ? $msg : ''; ?>

<h1><?= (isset($res)) ? $res : ''; ?></h1>

</body>
</html>