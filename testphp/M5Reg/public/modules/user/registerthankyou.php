<?php
ob_start();
include '../../includes/headerMain.php';

?>
 <!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
    <h1>Thank You</h1>
     <h3>You have successfully registered to community portal</h3>
     
    </div>
   
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
         <a href="/M5Reg/public/LoginSample.php" class="btn btn-info" role="button">Login</a>
  
      </div>
    </div>
  </form>
  
</div>

</body>
</html>
<?php 
include '../../includes/footer.php';
?>


