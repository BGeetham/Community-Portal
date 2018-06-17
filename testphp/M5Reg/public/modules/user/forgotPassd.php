<?php
ob_start();
require_once '../../includes/autoload.php';
require_once "../../includes/phpmailer/PHPMailerAutoload.php";
include '../../includes/headerMain.php';

use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;
$email='';
$formerror='';

if(isset($_REQUEST["submitted"])){
    
    $email=$_REQUEST["email"];
    
    
    if($email!='' ){
        $UM=new UserManager();
          
        $existuser=$UM->getUserByEmail($email);
        
          if(isset($existuser)){
            // Save the Data to Database         
            //header("Location:forgotEmailThankyou.php");
            
            $ranToken="asdfjklmrsyir98765nvhdfie543pqrh21";
            $ranToken=str_shuffle($ranToken);
            $ranToken= substr($ranToken,0,15);
            $setFgToken= $UM ->setForgetToken($ranToken, $existuser->email);
              if(isset($setFgToken)){
                  
                  $mail = new PHPMailer;
                  //Enable SMTP debugging.
                  $mail->SMTPDebug = 3;
                  //Set PHPMailer to use SMTP.
                  $mail->isSMTP();
                  //Set SMTP host name
                  $mail->Host = "smtp.gmail.com";
                  //Set this to true if SMTP host requires authentication
                  $mail->SMTPAuth = true;
                  //Provide username and password
                  $mail->Username = "geetha.abcportal@gmail.com";
                  $mail->Password = "capstone18";
                  //If SMTP requires TLS encryption then set it
                  $mail->SMTPSecure = "tls";
                  //Set TCP port to connect to
                  //$mail->Port = 587;
                  $mail->Port = 25;
                  $mail->From = "mehergeetha@gmail.com";
                  $mail->FromName = "Admin";
                  $mail->addAddress(trim($existuser->email), "User");
                  $mail->isHTML(true);
                  $mail->Subject = "Forgot Password";
                  $mail->Body = '<p>Dear '.ucwords($existuser->firstName.' '.$existuser->lastName).',<br><p> Please click <a href="http://localhost/M5Reg/public/modules/user/resetPassword.php?fpToken='.$ranToken.'&email='.trim($existuser->email).'" >here</a> to reset your password</p>';
                  //$mail->AltBody = "";
                  
                  if($mail->send()){
                     //header("Location:resetPassword.php?fpToken=$ranToken&email=$email");
                     header("Location:forgotEmailThankyou.php");
                      //echo '<br><h4><p>Hi '.ucwords($existuser->firstName.' '.$existuser->lastName).',</p></p>Thank You <br> Your password has been sent to '.$email.'. Please check your mail.</h4></p>';
                  }else{
                      echo "<br>Error in sending mail: ".$mail->ErrorInfo;
                  }
                
              }
           
        }
        else{
            $formerror="Enter a valid registered email address..
      Get instructions to reset your password via the email address for this account.";
        }
    }else{
        $formerror="Email id shouldn't be empty";
    }
}
?>

<form name="myForm" method="post">
<h1>Forgot Password </h1>
<div><?=$formerror?></div> &nbsp;&nbsp; 
<table border='1' width="800">
  <tr>
  <td>Enter Register Email &nbsp;&nbsp;</td>
    <td><input type="text" name="email" value="<?=$email?>" size="75"></td>
  </tr>
  <tr>
    <td colspan="2" align="right">
       <input type="hidden" name="submitted" value="1"><input type="submit" name="submit" value="Submit">
       
    </td>
  </tr>
 </table> 
</form>
<?php 
include '../../includes/footer.php';
?>