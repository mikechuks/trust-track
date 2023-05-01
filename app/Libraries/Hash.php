<?php 

namespace App\Libraries;

class Hash{
    public static function passwordsanitize($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }
    
    public static function passwordcheck($entered_password, $db_password){
        if (password_verify($entered_password, $db_password)) {
            return true;
        }else{
            return false;
        }
    }

    public static function newOldPasswordcheck($newPassword, $confirmNewpassword){
        if ($newPassword === $confirmNewpassword) {
            return true;
        }else{
            return false;
        }
    }

    public static function random_password() 
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!#[]';
        $password = array(); 
        $alpha_length = strlen($alphabet) - 1; 
        for ($i = 0; $i < 10; $i++) 
        {
            $n = rand(0, $alpha_length);
            $password[] = $alphabet[$n];
        }
        return implode($password); 
    }
}