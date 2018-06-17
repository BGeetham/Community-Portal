<?php
ob_start();
require_once '../../includes/autoload.php';

include '../../includes/headerMain.php';

use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;
?>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
.nav navbar-nav{
    margin-bottom:0px;
    bottom: 0;
}
.container-fluid{
    bottom: 0;
}

</style>


<?php 
$formerror='';
$passwd='';
$conPasswd='';
$email ='';
$fpToken = $_GET["fpToken"];
$successmsg="";
if(isset($_GET["email"]) && isset($_GET["fpToken"]) ){
    $email = trim($_GET["email"]);
    $UM=new UserManager();    
    $existuser=$UM->getUserByEmail($email);
    if(isset($existuser)  && $existuser->token == $fpToken ){
      
               
    }else{
        header("Location:../../LoginSample.php");
    }
   
}else{
    header("Location:../../LoginSample.php");
}

if(isset($_REQUEST["resetSubmit"]) && isset($_REQUEST["email"])){
    
    if(!empty($_POST['passwd']) && !empty($_POST['conPasswd'])){
        $password = $_POST['passwd'];
        $email =$_REQUEST["email"];
        //password and confirm password comparison
        if($_POST['passwd'] !== $_POST['conPasswd']){
            
            $formerror= 'Confirm password must match with the password.';
        }
        else{
            
            $UM=new UserManager();
            $result=$UM->resetPassword($email, $password);
            
            $successmsg = 'Your account password has been reset successfully. Please <a href="http://localhost/communityportal/">login </a> with your new password.';
                    //header("Location:resetThankyou.php");
            header("Location:resetPasswordConfirmation.php");
                
        }
  }else{
      //$formerror= "else block";
  }
} 
?>

<div class="login-form">
<form name="myForm" method="post">

	<h2 class="text-center">Reset Password</h2> 
	<input type="hidden" name="email" value="<?=$email?>">
	<div><p class="text-danger"><?=$formerror?></p></div> &nbsp;&nbsp; 
	<div class="form-group">
	
		    <input type="password" class="form-control" placeholder="New Password" required="required" name="passwd" value="<?=$passwd?>" >
    </div>
	<div class="form-group">
	
		    <input type="password" class="form-control" placeholder="Confirm Password" required="required" name="conPasswd" value="<?=$conPasswd?>" >
    </div>
    
    <div class="form-group">
            <input type="hidden" name="resetSubmit" value="1">
            <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">Submit</button>
   </div>

</form>
</div>
</html>
<?php 
include '../../includes/footer.php';
?>