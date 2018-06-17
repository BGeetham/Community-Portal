<?php
ob_start(); 
require_once '../../includes/autoload.php';
include '../../includes/headerMain.php';




use classes\business\UserManager;


$id=$_REQUEST["id"];
$UM=new UserManager();
$existuser=$UM->getUserById($id); 


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 10px;
		margin-top:150px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
	 body {
  font-family : Arial, Helvetica, Sans-Serif;
  background-color: #8f949a;
  overflow:hidden;
   width: 100%;
     margin: 0;
	 height:100%;
	  

}
.container {
     width: 100%;
     margin: 0 auto;
}
.btn, .signupbtn {
  float: left;
  width: 50%;
}

 
</style>
</head>
<body>



<div class="login-form">
    <form  method="post">
        <h2 class="text-center">Profile </h2>       
        <div class="form-group">
	
		<div class="container">
  
  <div class="form-group">
    <div class="media-left media-top">
      <img src="../../images/avatar.png" class="media-object" style="width:80px" align="center">
	  
		<div class="form-group">
<?=$existuser->firstName?>		</div>
		
        <div class="form-group">
		<?=$existuser->jTitle?>
		</div>
		<div class="form-group">
		<?=$existuser->city?>
		</div>
		
    </div>
    
  </div>
   </div>         
        </div>
		
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Message</button>
        
        
            <a href="#" class="pull-right"></a><button type="submit" class="btn btn-primary btn-block">Add Friend</button>
        </div>        
    </form>
   
</div>

</body>
</html>  
<?php 
include '../../includes/footer.php';
?>
                              		                            