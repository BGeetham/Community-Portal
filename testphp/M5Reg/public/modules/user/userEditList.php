<?php
ob_start(); 
require_once '../../includes/autoload.php';
include '../../includes/security.php';

include '../../includes/header.php';
use classes\business\UserManager;
$connect;
$users= [];
$firstname='';
$lastname='';
        $users= [];
$UM=new UserManager();

if(isset($_POST['Search'])){
    
    $firstname =  $_POST["FirstName"];
    $lastname = $_POST["LastName"];
    $users=$UM->getUserByFirstNLastName($firstname,$lastname);
      
}if(isset($_POST['Delete'])){
    $idArr = $_POST['checkbox'];
    
    $result=$UM->deleteUsersById($idArr);
    if($result='true')
     {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=userEditList.php\">";
     }
       
}if(isset($_POST['Block'])){
    
    $idArr = $_POST['checkbox'];
    $result=$UM->updateStatus($idArr);
    if($result='true')
    {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=userEditList.php\">";
    }
}
else {
   
    $users=$UM->getAllUsers();
}

?>
<!DOCTYPE html>
<html>
<head>
<style> 
input[type=text] {
    box-sizing: border-box;
    border: 5px grove grey;
    background-color: hsla(194, 100%, 53%, 1);
    padding : 5px;
    color: white;
    width:150px;
}
input[type=submit] {
    box-sizing: border-box;
    border: 5px grove grey;
    border-radious:5px;
    background-color: hsla(36, 100%, 53%, 1);
    padding : 5px;
    width:100px;
    color: black;
}
table
{
width :100%;
}

.delbut
{
align:right;
right:15%;
}
</style>

<title>Edit User Form</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body onload='setFocusFirstName();'>
<form action="userEditList.php" method="post">
    <table >
    <tr>
    <td> FirstName </td>
    <td > <input type="text" name="FirstName"  id="FirstName" value="<?=$firstname?>"> </td>
    <td>LastName</td>
    <td ><input type="text" name="LastName" id="LastName"  value="<?=$lastname?>"></td>
    <td colspan="2"><input type="submit" name="Search" value="Search"></td>
    <td colspan="2"><input type="submit" name="ClearSearch" value="ClearSearch"></td>
    <td colspan="2"><input type="submit" name="Delete" value="Delete"></td>
    <td colspan="2"><input type="submit" name="Block" value="Block">
    <td colspan="2"><input type="submit" name="BulkMail" value="BulkMail">
    </td>
    
    </tr>
    </table>
    <br>
    <table border=1 style='background-color:#0fa3ff; color:white;'>
                <tr style='padding:100px'>
                    <th>  </th>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    
                </tr>

             
         <?php 
        foreach ($users as $user) {
        if($user!=null){
            ?>
            <tr>
               <td><input type="checkbox" name="checkbox[]" id="checkbox_id[]" value='<?=$user->id?>' ></td>
               <td><?=$user->id?></td>
               <td><?=$user->firstName?></td>
               <td><?=$user->lastName?></td>
               <td><?=$user->email?></td>
            </tr>
            <?php 
        }
    }
    ?>     
     </table>
     </form>
        
    </body>
</html>
<?php 
include '../../includes/footer.php';
?>

