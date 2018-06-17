<?php 
include '../../includes/headerMain.php';


?>

<html>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
.login-form {
    width: 500px;
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

<body>

<div class="login-form">
<h2 class="text-center">Registration Confirmation</h2> 
    <form name="myForm" method="post">
              
        <div class="form-group">
	
		     
  <h2 align = "center">Are you Sure you want to proceed with the registraion?</h2>
</div>
   <div class="form-group">
	
  <a href="registerthankyou.php"><button type="button" class="btn btn-primary">Continue</button>
  <a href="/M5Reg/public/LandingPage.php"><button type="button" class="btn btn-primary">Cancel</button>
        <div class="clearfix">
            
            
        </div>        
    </form>
    </div>
</div>
</body>


</html>
<?php 
include '../../includes/footer.php';
?>