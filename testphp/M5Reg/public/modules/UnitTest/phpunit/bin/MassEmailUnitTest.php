<?php

require_once "../../../../includes/phpmailer/PHPMailerAutoload.php";

class MassEmailUnitTest
{
  
    
    public function __construct()
    {
        
    }
    
    public function sendMail()
    {
        $formerror="";
        $recipient;
        $subject ;
        $message ;
        $email="";
        //$UM=new UserManager();
       // $users=$UM->getAllUsers();
        $selected=array();
        $subject="test";
        $message ="test";
        $recipients;
        $firstName="srini";
        //$recipients = explode(',', $_POST['recipients']);
        $emailRecipient="seenuboorla@gmail.com";
        $recipients="seenuboorla@gmail.com";
        //Proceed when $recipients is not empty
        if($recipients) {
            $mail = new PHPMailer;
            //Enable SMTP debugging.
            //$mail->SMTPDebug = 3;
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
            $mail->From = "geetha.abcportal@gmail.com";
            $mail->FromName = "Admin";
            //	$mail->addAddress(trim($existuser->email), "User");
            
            //foreach($recipients as $emailRecipient){
                //$mail->addAddress($emailRecipient,$UM->getUserByEmail($emailRecipient)->firstName);
                $mail->addAddress($emailRecipient,$firstName);
            //}
            $mail->isHTML(true);
            $mail->Subject = $subject ;
            $mail->Body = $message ;
            
            
            if($mail->send()){
                
                //echo "mail send successfully";
                return "true";
                
            }
            else{
                //echo "Error in sending mail".$mail->ErrorInfo;
                return "false";
            }
        }
        else{
            //echo 'No Email in recipients';
            return "false";
        }
        
        
        
    }
}
