<?php
ob_start();
include '../../includes/headerMain.php';

?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
     <h3>Password reset link sent to your email id. Please check your email. </h3>
     
    </div>
   
    
  </form>
  
</div>

</body>
</html>
<?php 
include '../../includes/footer.php';
?>
