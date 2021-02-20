<?php
namespace App\utile;

class Security{

    public static function generateToken($nom = ''){
        $token = uniqid(rand(), true);
        $_SESSION[$nom.'_token'] = $token;
        $_SESSION[$nom.'_tokenTime'] = time();
        return $token;
    }

    public static function controleToken($userToken = null){
        if( isset($_SESSION['_token']) && isset($_SESSION['_tokenTime']) && isset($userToken) ){
            if($_SESSION['_token'] === $userToken){
                $time = time();
                if($time > $_SESSION['_tokenTime'] && $time <= $_SESSION['_tokenTime'] + (15*60)){
                    unset($_SESSION['_token']);
                    unset($_SESSION['_tokenTime']);
                    return;
                }else{
                    session_destroy();
                    header('Location: /#secu');
                    exit;
                }
            }else{
                session_destroy();
                header('Location: /#secu');
                exit;

            }
        }else{
            session_destroy();
            header('Location: /#secu');
            exit;
        }
    }

    public static function checkSession(){
        if(!isset($_SESSION['_lastConnection'])){
            $_SESSION['_lastConnection'] = time();
        }
        if(!isset($_SESSION['_ipUser'])){
            $_SESSION['_ipUser'] = $_SERVER['REMOTE_ADDR'];
        }
        if( ($_SESSION['_ipUser'] === $_SERVER['REMOTE_ADDR']) && ($_SESSION['_lastConnection'] + (60*60) > time()) ){
            $_SESSION['_lastConnection'] = time();
            return;
            exit;
        }else{
            session_destroy();
            header('Location: /#secu');
            exit; 
        }
    }

}

