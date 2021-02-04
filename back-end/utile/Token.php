<?php
namespace App\utile;

class Token{

    public static function generateToken($nom = ''){
        $token = uniqid(rand(), true);
        $_SESSION[$nom.'_token'] = $token;
        $_SESSION[$nom.'_tokenTime'] = time();
        // echo $token;
        return $token;
    }

    public static function controleToken($userToken){
        if( isset($_SESSION['_token']) && isset($_SESSION['_tokenTime']) && isset($userToken) ){
            if($_SESSION['_token'] === $userToken){
                $time = time();
                if($time > $_SESSION['_tokenTime'] && $time <= $_SESSION['_tokenTime'] + (15*60)){
                    return true;
                }else{
                    session_destroy();
                    return false;
                }
            }else{
                session_destroy();
                return false;
            }

        }else{
            session_destroy();
            return false;
        }
    }

}