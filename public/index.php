<?php
session_start();
require "../vendor/autoload.php";
require "../config.php";
require "../gestionAcces.php";
// var_dump($_SESSION);

use \App\controler\UserControler; 
use \App\controler\posts; 
// phpinfo();

/**
 * $activation -- true = Maintenance Activate
 * $ipAccepted -- Array of ip accepted
 * Return true if $activation = false or ip of user is in Array ipAccepted
 */
function Maintenance($activation, $ipAccepted){
    if($activation){
        $maintenance = new Maintenance ($ipAccepted, $activation);
        if($maintenance->getAutorisation() == false){
            $maintenance->pageMaintenance();
        }else{
            return true;
        }
    }else{
        return true;
    }
}


$router = new AltoRouter();
if(!Maintenance(true, $ipAccepted)){}else{
    
    $router->map('GET', '/', function(){ require("view/home.php");} , 'home');


    /**
     * Parti utilisateur
     */
    $router->map('GET', '/account', function(){ require("view/account.php");}, 'account');
    $router->map('GET', '/my-account', function(){
        $userControler = new UserControler;
        $userControler->myAccount();
    },'my-account');
    $router->map('GET', '/logOut', function(){$userControler = new UserControler;$userControler->logOut();}, 'deconnexion');
    $router->map('POST', '/addUser', function(){
        $userControler = new UserControler;
        $userControler->addUser(htmlspecialchars($_POST['email']),
        htmlspecialchars($_POST['pseudo']),
        htmlspecialchars($_POST['password1']),
        htmlspecialchars($_POST['password2']));
    });
    $router->map('POST', '/logIn', function(){
        $userControler = new UserControler;
        $userControler->logIn( htmlspecialchars($_POST['pseudo']), 
        htmlspecialchars($_POST['password']));
    });
    $router->map('POST', '/updateUserInformation', function(){
        $userControler = new UserControler;
        $userControler->updateUserInformation( htmlspecialchars($_POST['first_name']), 
        htmlspecialchars($_POST['last_name']),
        htmlspecialchars($_POST['email']),
        htmlspecialchars($_POST['pseudo']));
    });
    $router->map('POST','/updatePassword', function(){
        $userControler = new UserControler;
        $userControler->updatePassword( htmlspecialchars($_POST['lastPassword']),
        htmlspecialchars($_POST['password1']), 
        htmlspecialchars($_POST['password2']));
    });
    //Contact
    $router->map('GET', '/contact', function(){
    $userControler = new UserControler;
    $userControler->contact();
    }, 'contact');
    $router->map('POST', '/sendMailContact', function(){
        $userControler = new UserControler;
        $userControler->sendMailContact( htmlspecialchars($_POST['first&last_name']),
        htmlspecialchars($_POST['contact_email']),
        htmlspecialchars($_POST['content_message']));
    });
 



    if(isset($_SESSION['admin'])){
        // echo 'test ++';
    }


    $match = $router->match();
    // var_dump($_POST);
    // var_dump($match);
    // var_dump($routes);

    if( is_array($match) && is_callable( $match['target']) ) {
        call_user_func_array( $match['target'], $match['params'] ); 
    } else {
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    }

}
