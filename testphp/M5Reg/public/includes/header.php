
<?php 
   if(isset($_SESSION["email"])){
       $rolId=$_SESSION["roleId"];
       ?>
       <!DOCTYPE html>
<html lang="en">
<head>
  <title>Personal Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img id ="i1" class ="img" src="/M5Reg/public/images/imglogo_u7.png" class="img-fluid"></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="/M5Reg/public/home.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Me<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="">View Profile</a></li>
          <li><a href="/M5Reg/public/logout.php">Signout</a></li>
           <li><a href="/M5Reg/public/modules/user/updateprofile.php">Update Profile</a></li>
          
          
        </ul>
      </li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/M5Reg/public/modules/user/searchUser.php"><span class="glyphicon glyphicon-search"></span> Search Users</a></li>
      
      <?php if($rolId=="1"){?>
      <li><a href="/M5Reg/public/modules/user/userEditList.php">View Users</a></li>
      <li><a href="/M5Reg/public/modules/user/MassEmail.php">Bulk Email</a></li>
      <?php }?>
    </ul>
  </div>
</nav>
 </br></br></br>

</body>
</html>
 <?php 
   }
?>

