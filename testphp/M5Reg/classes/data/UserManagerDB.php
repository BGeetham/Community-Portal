<?php
namespace classes\data;

use classes\entity\User;
use classes\util\DBUtil;

class UserManagerDB
{
    public static function fillUser($row){
        $user=new User();
        $user->id=$row["User_Id"];
        $user->firstName=$row["First_Name"];
        $user->lastName=$row["Last_Name"];
        $user->email=$row["Email"];
        $user->password=$row["Password"];
        $user->country=$row["Country"];
        $user->city=$row["City"];
        $user->roleId=$row["Role_id"];
        $user->cName=$row["Comp_Name"];
        $user->jTitle=$row["Job_title"];  
        $user->status=$row["Status"];
        $user->token=$row["Token"];
        
        return $user;
    }
    public static function getUserByEmailPassword($email,$password){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $password=mysqli_real_escape_string($conn,$password);
        $sql="select * from cp_tb_user where email='$email' and password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }
    
    public static function getUserByEmail($email){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $sql="select * from cp_tb_user where Email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }
    public static function getUserById($id){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $id=mysqli_real_escape_string($conn,$id);
        $sql="select * from cp_tb_user where User_Id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }
    public static function saveUser(User $user){
        $conn=DBUtil::getConnection();
        $sql="call procSaveUser(?,?,?,?,?,?,?,?,?)";
       
        $stmt = $conn->prepare($sql);
                                                                                                                  
       $stmt->bind_param("issssssss",$user->id,$user->firstName, $user->lastName, $user->email,$user->password,$user->country,$user->city, $user->cName, $user->jTitle); 
        
        $stmt->execute();
        if($stmt->errno!=0){
            printf("Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();
    }
    public static function getAllUsers(){
        $users[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from cp_tb_user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
                $users[]=$user;
            }
        }
        $conn->close();
        return $users;
    }
    
    public static function getUserByFirstNLastName($firstName,$lastName){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $users[]=array();
        $firstName=mysqli_real_escape_string($conn,$firstName);
        $lastName=mysqli_real_escape_string($conn,$lastName);
        $sql="select * from cp_tb_user  where First_Name like '%{$firstName}%' || Last_Name like '%{$lastName}%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
                $users[]=$user;
            }
        }
        $conn->close();
        return $users;
    }
    public static  function deleteUsersById($idArr){
        $conn=DBUtil::getConnection();
        $result='';
        foreach($idArr as $value){
            $sql ="DELETE FROM cp_tb_user WHERE User_Id=".$value;
            $result = $conn->query($sql);
            
        }
        return $result;
    }
    public static function updateStatus($idArr){
        
        $conn=DBUtil::getConnection();
        $result='';
        foreach($idArr as $value){
            $sql ="update cp_tb_user set Status='Block' WHERE User_Id=".$value;
            $result = $conn->query($sql);
            
        }
        return $result;
    }
    
    public static function setForgetToken($token,$email){
        
        $conn=DBUtil::getConnection();
        $result='';
        $sql = "update cp_tb_user set token = '$token' where email = '$email'";
                
        $result = $conn->query($sql);
              
        return $result;
    }
    public static function resetPassword($email,$passwd)
    {
        $conn=DBUtil::getConnection();
        $result='';
        $sql = "update cp_tb_user set password = '$passwd'  where email = '$email'";
        
        $result = $conn->query($sql);
        
        return $result;
    }
}

?>