<?php
ob_start();
require_once '../../includes/autoload.php';
include '../../includes/headerMain.php';

use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;

$formerror="";

$firstName="";
$lastName="";
$email="";
$password="";
$cPassword="";
$country="";
$city="";
$jTitle="";
$cName="";

if(isset($_REQUEST["submitted"])){
    $firstName=$_REQUEST["firstName"];
    $lastName=$_REQUEST["lastName"];
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    $cPassword=$_REQUEST["cPassword"];
    $country=$_REQUEST["country"];
    $city=$_REQUEST["city"];
    $jTitle=$_REQUEST["jTitle"];
    $cName=$_REQUEST["cName"];
   
    if($firstName!='' && $lastName!='' && $email!='' && $password!=''){
        $UM=new UserManager();
        $user=new User();
        $user->firstName=$firstName;
        $user->lastName=$lastName;
        $user->email=$email;
        $user->password=$password;
        $user->country=$country;
        $user->city=$city;
        $user->jTitle=$jTitle;
        $user->cName=$cName;
                
        $existuser=$UM->getUserByEmail($email);
    
        if(!isset($existuser)){
            // Save the Data to Database
            $UM->saveUser($user);
            header("Location:RegistraionConfirmation.php");
        }
        else{
            $formerror="User Already Exist";
        }
    }else{
        $formerror="Please fill in the fields";
    }
}

?>
<html lang="en">

<script>
function validateForm()
{   
	
	var error="";
	var firstname = document.forms["myForm"].firstName.value;
	var lastname  = document.forms["myForm"].lastName.value
	var email = document.forms["myForm"].email.value
	
	var password = document.forms["myForm"].password.value
	var cPassword  = document.forms["myForm"].cPassword.value
	var country = document.forms["myForm"].country.value
	var city = document.forms["myForm"].city.value
	var cName = document.forms["myForm"].cName.value
	var jTitle = document.forms["myForm"].jTitle.value
	
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	
	if (firstname == "") {
		  error = " First name cannot be empty ";
		  document.getElementById( "error" ).innerHTML = error;
		  document.getElementById( "firstName" ).focus();
		  return false;
    }
		 
	if (lastname == "") {firstName
		  error = "Last name cannot be empty ";
		  document.getElementById( "error" ).innerHTML = error;
		  document.getElementById( "lastName" ).focus();
		  return false; 
    }
		
	if (email == "") {
		  error = " email cannot be empty ";
		  document.getElementById( "error" ).innerHTML = error;
		  document.getElementById( "email" ).focus();
		  return false; 
    }

	if ( password== "") {
		  error = " Password cannot be empty ";
		  document.getElementById( "error" ).innerHTML = error;
		  document.getElementById( "password" ).focus();
		  return false; 
    }
	if (cPassword == "") {
		  error = " Confirm Password cannot be empty ";
		  document.getElementById( "error" ).innerHTML = error;
		  document.getElementById( "cPassword" ).focus();
		  return false; 
  }
	if ( country== "") {
		  error = "Country cannot be empty ";
		  document.getElementById( "error" ).innerHTML = error;
		  document.getElementById( "country" ).focus();
		  return false; 
  }
	if ( city== "") {
		  error = "City cannot be empty ";
		  document.getElementById( "error" ).innerHTML = error;
		  document.getElementById( "city" ).focus();
		  return false; 
  }
	if ( cName== "") {
		  error = "Company Name cannot be empty ";
		  document.getElementById( "error" ).innerHTML = error;
		  document.getElementById( "cName" ).focus();
		  return false; 
  }
	if ( jTitle== "") {
		  error = " Job Title cannot be empty ";
		  document.getElementById( "error" ).innerHTML = error;
		  document.getElementById( "jTitle" ).focus();
		  return false; 
  }
	if ( password !=cPassword) {
		  error = " Password and Confirm password should be the same ";
		  document.getElementById( "error" ).innerHTML = error;
		  document.getElementById( "password" ).focus();
		  return false; 
  }

	if( email.match(mailformat))
	{
		alert(email.match(mailformat));
		return true;
	}
	else
	{   
		error = "You have entered an invalid email address!";
		alert("You have entered an invalid email address!");
		alert(email.match(mailformat));
		document.getElementById("email").focus();	
		return false;
	}
	
return true;
} 


</script> 
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>


	.palel-primary
	{
		border-color: #bce8f1;
	}
	.panel-primary>.panel-heading
	{
		background:#bce8f1;
		
	}
	.panel-primary>.panel-body
	{
		background-color: #EDEDED;
	}

.error {color: #FF0000;}

</style>
</head>

<body>





<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Enter Your Details Here
			</div>
			<div class="panel-body">
			    <p id="error" style="color:red"></p>
				<form name="myForm" method="post" onsubmit="return validateForm();">
					<div class="form-group">
						<label for="myName" class="col-sm-4 control-label">First Name *</label>
						 <div class="col-sm-8">
						<input id="firstName" name="firstName" class="form-control" value="<?=$firstName?>" type="text" data-validation="required">
						<span id="error_name" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="lastname" class="col-sm-4 control-label">Last Name *</label>
						<div class="col-sm-8">
						<input id="lastName" name="lastName" value="<?=$lastName?>" class="form-control" type="text" data-validation="required">
						<span id="error_lastname" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="age" class="col-sm-4 control-label">Email *</label>
						<div class="col-sm-8">
						<input id="email" name="email" value="<?=$email?>"  class="form-control" type="text"  data-validation="email">
						<span id="error_age" class="text-danger"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="myName" class="col-sm-4 control-label">Password *</label>
						<div class="col-sm-8">
						<input id="password" name="password" value="<?=$password?>" class="form-control"  type="password" data-validation="required">
						<span id="error_name" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="myName" class="col-sm-4 control-label">Confirm Password *</label>
						<div class="col-sm-8">
						<input id="cPassword" name="cPassword" value="<?=$cPassword?>" class="form-control"  type="password" data-validation="required">
						<span id="error_name" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="myName" class="col-sm-4 control-label">Country *</label>
						<div class="col-sm-8">
						<input id="country" name="country" value="<?=$country?>"  class="form-control"  type="text" data-validation="required">
						<span id="error_name" class="text-danger"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="myName" class="col-sm-4 control-label">City*</label>
						<div class="col-sm-8">
						<input id="city" name="city" value="<?=$city?>" class="form-control"  type="text" data-validation="required">
						<span id="error_name" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="myName" class="col-sm-4 control-label">Company Name *</label>
						<div class="col-sm-8">
						<input id="cName" name="cName" value="<?=$cName?>" class="form-control"  type="text" data-validation="required">
						<span id="error_name" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="myName" class="col-sm-4 control-label">Job Title *</label>
						<div class="col-sm-8">
						<input id="jTitle" name="jTitle" value="<?=$jTitle?>" class="form-control"  type="text" data-validation="required">
						
						<span id="error_name" class="text-danger"></span>
						</div>
					</div>
					
					<div class="form-group">
					<input type="hidden" name="submitted" value="1">	
				    <div class="col-sm-8">			
					<button  style="float: right" id="submit" type="submit" name="submit" value="Submit" class="btn btn-primary center" onclick = "validateForm();">Submit</button>
					</div>
					<div class="col-sm-4">
					<input style="float: right" type="submit" name="clear" value="Clear Search" onclick="javascript:clearForm();" class="btn btn-primary center">
			        </div>
			        </div>
				</form>

			</div>
		</div>
	</div>
</div>

     
</body></html>
<?php 
include '../../includes/footer.php';
?>


