<?php
namespace classes\business;

use classes\entity\User;
use classes\data\UserManagerDB;

class UserManager
{
    public static function getAllUsers(){
        return UserManagerDB::getAllUsers();
    }
    public function getUserByEmailPassword($email,$password){
        return UserManagerDB::getUserByEmailPassword($email,$password);
    }
    public function getUserByEmail($email){
        return UserManagerDB::getUserByEmail($email);
    }
    public function saveUser(User $user){
        UserManagerDB::saveUser($user);
    }
    public static function getUserByFirstNLastName($firstName,$lastName){
        return UserManagerDB::getUserByFirstNLastName($firstName,$lastName);
    }
    public static function deleteUsersById($idArr){
        
        return UserManagerDB::deleteUsersById($idArr);
    }
    public static function updateStatus($idArr)
    {
        return UserManagerDB::updateStatus($idArr);
    }
    public static function getUserById($id){
        return UserManagerDB::getUserById($id);
    }
    public static function setForgetToken($token,$emai)
    {
        return UserManagerDB::setForgetToken($token, $emai);
        
    }
    public static function resetPassword($email,$passwd)
    {
        return UserManagerDB::resetPassword($email, $passwd);
    }
}

?>