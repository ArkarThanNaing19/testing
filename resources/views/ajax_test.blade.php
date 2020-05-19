<html>
   <head>
      <title>Ajax Example</title>

      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>

      <script>
      $(document).ready(function(){

         $('#hello').submit(function(e){
           e.preventDefault();

            $.ajax({

               method:'post',
               url:'demo-test',
               'data':$(this).serialize(),
               success:function(data){
                 console.log(data);
                  $("#msg").html(data.msg);
               },
               error:function(){
                 alert("Something is Wrong !");
               }
            });
         });

         $("#testing").click(function(d){
           d.preventDefault();

           $.ajax({
             method : 'get',
             url : 'demo-test',
             success : function(data){
               console.log(data);
               var x = data.msg;
               $('#demo').html('<?php $x = 2 ; ?>')
             },
             error : function(){
               alert("E r r o o o o o o r !!!!")
             }
           })
         })
      })
      </script>
      <script type='text/javascript'>

function test()

{

alert("<?php echo "Testing"; ?>");

}



</script>
   </head>

   <body>
      <div id = 'msg'>This message will be replaced using Ajax.
         Click the button to replace the message.</div>


      <form id="hello">
        {{ csrf_field() }}
        <button type="submit" name="button" >Click</button>
      </form>

      <a href="" id="testing">Click Here</a>
      <button type="button" name="button" onclick="test()">click</button>

      <p id="demo"><?php $x=1 ?></p>
      <span><?= $x ?></span>

   </body>
</html>
