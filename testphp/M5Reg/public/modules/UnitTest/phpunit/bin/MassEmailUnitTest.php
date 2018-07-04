<?php

require_once "../../../../includes/phpmailer/PHPMailerAutoload.php";

class MassEmailUnitTest
{
  
    
    public function __construct()
    {
        
    }
    
    public function sendMail($emailRecipient)
    {
        
        $subject ;
        $message ;
        $email="";
        $selected=array();
        $subject="test";
        $message ="test";
        $recipients;
        $firstName="srini";
        
         $recipients="seenuboorla@gmail.com";
      
        if($recipients) {
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
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
                     
            $mail->addAddress($emailRecipient,$firstName);
            
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
