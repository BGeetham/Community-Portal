<?php

ob_start();

require_once '../../includes/autoload.php';
include '../../includes/header.php';

use classes\business\UserManager;
use classes\entity\User;

include '../../includes/security.php';
include '../../includes/header.php';
$firstName="";
$lastName="";
$email="";
$password="";
$country="";
$city="";
$cName="";
$jTitle="";
$flag="";
$users= [];
?>
<!Doctype HTML>
<html>
<head>
<style> 
input[type=text] {
    box-sizing: border-box;
    border: 5px grove grey;
    background-color: #0fa3ff;
    padding : 5px;
    color: white;
}
input[type=submit] {
    box-sizing: border-box;
    border: 5px grove grey;
    border-radious:5px;
    background-color: hsla(36, 100%, 53%, 1);
    padding : 5px;
    width:100px;
    color: white;
}
table
{
width :100%
}
</style>

<title>Search a record</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body onload='setFocusFirstName();'>

<?php 
     
      if(isset($_POST['Search'])){
         
         $firstName = $_POST["firstName"];
         $lastName = $_POST["lastName"];
         
          if($firstName!='' || $lastName!='')
         {
       
             $UM=new UserManager();
             $users=$UM->getUserByFirstNLastName($firstName,$lastName);
             $flag="true";
         
        }
         
     }
 ?>
<form action="searchUser.php" method="post">
    <table cellspacing="10">
    <tr>
    <td> FirstName </td>
    <td> <input type="text" name="firstName"  id="firstName" value="<?=$firstName?>"> </td>
    <td>LastName</td>
    <td><input type="text" name="lastName" id="lastName"  value="<?=$lastName?>"></td>
       
    <td colspan="2"><input type="submit" name="Search" value="Search"></td>
    <td colspan="2"><input type="submit" name="ClearSearch" value="ClearSearch"></td></tr>
     </table>
             
     
     
     
     <?php 
     
     if($flag!=''){
         ?>
    <br/><br/>Below is the list of Developers registered in community portal <br/><br/>
    <table width="800" border="1">
            <tr>
               <td><b>Id</b></td>
               <td><b>First Name</b></td>
               <td><b>Last Name</b></td>
               <td><b>Email</b></td>
               <td><b>Country</b></td>
               <td><b>City</b></td>
               <td><b>Company Name</b></td>
               <td><b>Job Title</b></td>
               <td></td>
              
               
            </tr>    
    <?php 
    foreach ($users as $user) {
        if($user!=null){
            ?>
            <tr>
               <td><?=$user->id?></td>
               <td><?=$user->firstName?></td>
               <td><?=$user->lastName?></td>
               <td><?=$user->email?></td>
               <td><?=$user->country?></td>
               <td><?=$user->city?></td>
               <td><?=$user->cName?></td>                
                <td><?=$user->jTitle?></td>
                <td><b><a href="publicProfile.php?id=<?=$user->id?>">View</a></b></td>
                 
                  
            </tr>
            <?php 
        }
    }
    ?>
    </table><br/><br/>
    <?php 
}
?>
        </form>
        
    </body>
</html>


<?php
include '../../includes/footer.php';
?>