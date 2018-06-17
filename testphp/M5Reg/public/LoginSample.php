<?php
ob_start();
use classes\business\UserManager;
require_once 'includes/autoload.php';
include 'includes/headerMain.php';
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

$formerror="";
$flag="";
$email="";
$password="";
if(isset($_REQUEST["submitted"])){
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    $UM=new UserManager();
    $existuser=$UM->getUserByEmailPassword($email,$password);
    if(isset($existuser)){
        if($existuser->status=="Block"){
            $formerror="User Email id has blocked, Please contact Admin";
        }else{
            session_start();
            $_SESSION['email']=$email;
            $_SESSION["roleId"]=$existuser->roleId;
            $_SESSION['firstName']=$existuser->firstName;
            
            header("Location:home.php");
             $flag="true";
             
        }
    }else{
        $formerror="Invalid User Name or Password";
    }
}

if ($flag!="true")
{
?>

<div><?=$formerror?></div>

<div class="login-form">
    <form name="myForm" method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
	
		    <input type="text" class="form-control" placeholder="Email" required="required" name="email" value="<?=$email?>" >
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required" name="password" value="<?=$password?>">
        </div>
        
        
        <div class="form-group">
            <input type="hidden" name="submitted" value="1">
            <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
         <a href="/M5Reg/public/modules/user/register.php">Register Here</a>&nbsp;&nbsp;
            
            <a href="/M5Reg/public/modules/user/forgotPassd.php" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
   
</div>


<?php }?>
</html>
<?php
include 'includes/footer.php';
?>
