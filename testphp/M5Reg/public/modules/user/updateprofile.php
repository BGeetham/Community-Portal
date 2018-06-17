<?php
ob_start(); 
require_once '../../includes/autoload.php';
use classes\business\UserManager;
include '../../includes/security.php';
include '../../includes/header.php';


$formerror="";
$firstName="";
$lastName="";
$email="";
$password="";
$country="";
$city="";
$cName="";
$jTitle="";

if(!isset($_REQUEST["submitted"])){
  $UM=new UserManager();
  $existuser=$UM->getUserByEmail($_SESSION["email"]);
  $firstName=$existuser->firstName;
  $lastName=$existuser->lastName;
  $email=$existuser->email;
  $password=$existuser->password;
  $country=$existuser->country;
  $city=$existuser->city;
  $cName=$existuser->cName;
  $jTitle=$existuser->jTitle;
}else{
  $firstName=$_REQUEST["firstName"];
  $lastName=$_REQUEST["lastName"];
  $email=$_REQUEST["email"];
  $password=$_REQUEST["password"];
  $country=$_REQUEST["country"];
  $city=$_REQUEST["city"];
  $cName=$_REQUEST["cName"];
  $jTitle=$_REQUEST["jTitle"];

  if($firstName!='' && $lastName!='' && $email!='' && $password!=''){
       $update=true;
       $UM=new UserManager();
       if($email!=$_SESSION["email"]){
           $existuser=$UM->getUserByEmail($email);
           if(isset($existuser)){
               $formerror="User Email already in use, unable to update email";
               $update=false;
           }
       }
       if($update){
           $existuser=$UM->getUserByEmail($_SESSION["email"]);
           $existuser->firstName=$firstName;
           $existuser->lastName=$lastName;
           $existuser->email=$email;
           $existuser->password=$password;
           $existuser->country=$country;
           $existuser->city=$city;
           $existuser->cName=$cName;
           $existuser->jTitle=$jTitle;           
           $UM->saveUser($existuser);
           $_SESSION['firstName']=$firstName;
           $_SESSION["email"]=$email;
           header("Location:../../home.php");
       }
  }else{
      $formerror="Please provide required values";
  }
}
?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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

</style>
</head>

<body>

<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Update Profile
			</div>
			<div class="panel-body">
				<form name="myForm" method="post">
					<div class="form-group">
						<label for="myName">First Name *</label> 
						
						<input id="myName" name="firstName" value="<?=$firstName?>" class="form-control"  type="text" data-validation="required">
						<span id="error_name" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="lastname">Last Name *</label>
						<input id="lastname" name="lastName" value="<?=$lastName?>" class="form-control" type="text" data-validation="required">
						<span id="error_lastname" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="age">Email *</label>
						<input id="email" name="email" value="<?=$email?>"   class="form-control" type="text"  data-validation="email">
						<span id="error_age" class="text-danger"></span>
					</div>
					
					<div class="form-group">
						<label for="myName">Password *</label>
						<input id="myName" name="password" value="<?=$password?>"class="form-control"  type="password" data-validation="required">
						<span id="error_name" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="myName">Confirm Password *</label>
						<input id="myName" name="cpassword" value="<?=$password?>" class="form-control"  type="password" data-validation="required">
						<span id="error_name" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="myName">Country *</label>
						<input id="myName" name="country" value="<?=$country?>"  class="form-control"  type="text" data-validation="required">
						<span id="error_name" class="text-danger"></span>
					</div>
					
					<div class="form-group">
						<label for="myName">City*</label>
						<input id="myName" name="city" value="<?=$city?>" class="form-control"  type="text" data-validation="required">
						<span id="error_name" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="myName">Company Name *</label>
						<input id="myName" name="cName" value="<?=$cName?>" class="form-control"  type="text" data-validation="required">
						<span id="error_name" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="myName">Job Title *</label>
						<input id="myName" name="jTitle" value="<?=$jTitle?>" class="form-control"  type="text" data-validation="required">
						
						<span id="error_name" class="text-danger"></span>
					</div>
					<input type="hidden" name="submitted" value="1">					
					<button id="submit" type="submit" name="submit" value="Submit" class="btn btn-primary center">Submit</button>
					<input type="submit" name="clear" value="Clear Search" onclick="javascript:clearForm();" class="btn btn-primary center">
			
				</form>

			</div>
		</div>
	</div>
</div>
</body>   
</br></br></br>

<?php
include '../../includes/footer.php';
?>
</html>