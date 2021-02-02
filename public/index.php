<?php
session_start();
require "../vendor/autoload.php";
require "../config.php";
require "../gestionAcces.php";
// var_dump($_SESSION);
// var_dump($_SERVER);

use \App\controler\UserControler; 
use \App\controler\PostControler; 
use \App\controler\AdminControler;
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


    // Blog
    $router->map('GET', '/posts', function(){ // Listing des articles
        $userControler = new PostControler; 
        $userControler->postsList();
    }); 
    $router->map('GET', '/post/[i:id]', function($id){ // Affichage d'un article
        $postControler = new PostControler;
        if(isset($_SESSION['info'])){
            $elements['info'] = $_SESSION['info'];
            unset($_SESSION['info']);
            $postControler->post($id, $elements); 
        }else{
            $postControler->post($id); 
        }
        
    });
    $router->map('POST', '/insertComment/[i:id]', function($id){ // Insertion d'un commentaire
        $postControler = new PostControler();
        $elements['idPost'] = $id; 
        $elements['pseudo'] = htmlspecialchars($_POST['pseudo']);
        $elements['comment'] = htmlspecialchars($_POST['comment']);
        if(isset($_POST['email'])){
            $elements['email'] = htmlspecialchars($_POST['email']);
        }
        $postControler->insertComment($elements);
    });

    // Pages
    $router->map('GET', '/mentions-legales', function(){
        require('view/mentions-legales.php');
    });

    $router->map('GET', '/projects', function(){
        // Code pour afficher la page projet
    });


    if(isset($_SESSION['admin']) && $_SESSION['admin'] === "3"){
        //Zone Blog Post admin  
        $router->map('GET', '/createPost', function(){
            $postControler = new PostControler; // Page de création d'un article
            $postControler->createPost();
        });

        $router->map('POST', '/insertPost', function(){ // Insertion d'un article
            $postControler = new PostControler;
            $statusPost = true;
            if( isset($_POST['draft']) ){ //Obligation de laisser cette condition pour savoir si l'article doit être un brouillon ou pas. Utilisation de isset pour savoir. 
                $statusPost = false;
            };
            $elements['titlePost'] = htmlspecialchars($_POST['titlePost']);
            $elements['shortDesciptions'] = htmlspecialchars($_POST['shortDescription']);
            $elements['content'] = $_POST['content'];
            $elements['statusPost'] = $statusPost;

            $postControler->insertPost($elements);
        });
        $router->map('GET', '/updatePost/[i:id]', function($id){ // Page update d'un article
            $postControler = new PostControler;
            $elements['id'] = $id;
            if(isset($_SESSION['info'])){
                $elements['info'] = $_SESSION['info'];
                    unset($_SESSION['info']);
            }
            if(isset($_SESSION['titlePost']) && isset($_SESSION['shortDescription']) && isset($_SESSION['content'])){
                $elements['titlePost'] = htmlspecialchars($_SESSION['titlePost']); 
                    unset($_SESSION['titlePost']);
                $elements['shortDescription'] = htmlspecialchars($_SESSION['shortDescription']);
                    unset($_SESSION['shortDescription']);
                $elements['content'] = htmlspecialchars($_SESSION['content']);
                    unset($_SESSION['content']);
                $postControler->updatePost($elements);
            }else{
                $postControler->updatePost($elements);
            }
        });
        $router->map('POST', '/insertUpdatePost', function(){ // Insertion de l'update d'un article
            $postControler = new PostControler;
            $statusPost = true;
            if( isset($_POST['draft']) ){ //Obligation de laisser cette condition pour savoir si l'article doit être un brouillon ou pas. Utilisation de isset pour savoir. 
                $statusPost = false;
            };
            $postControler->insertUpdatePost(htmlspecialchars($_POST['titlePost']), htmlspecialchars($_POST['shortDescription']), $_POST['content'], $_POST['id_post'], $statusPost);
        });

        $router->map('GET', '/deletePost/[i:id]', function($id){
            $postControler = new PostControler;
            $postControler->deletePost($id);
        });

        // Zone admin des commentaires
        $router->map('GET', '/admin/commentModeration', function(){
            $postControler = new PostControler; 
            if(isset($_SESSION['info'])){
                $elements['infoModification'] = $_SESSION['info'];
                unset($_SESSION['info']);
                $postControler->commentModeration($elements);
            }else{
                $postControler->commentModeration();
            }
            
        });
        $router->map('GET', '/removeComment/[i:id]', function($id){
            $postControler = new PostControler;
            $postControler->removeComment($id);
        });

        $router->map('GET', '/validComment/[i:id]', function($id){
            $postControler = new PostControler;
            $postControler->checkComment($id);
        });

        // Zone admin
        $router->map('GET', '/admin/dashboard', function(){
            $adminControler = new AdminControler;
            $adminControler->dashboard();
        });

        $router->map('GET', '/admin/posts', function(){
            $postControler = new PostControler;
            if(isset($_SESSION['info'])){
                $elements['infoModfication'] = $_SESSION['info'];
                unset($_SESSION['info']);
                $postControler->adminPosts($elements);
            }
            $postControler->adminPosts();
        });

    } 
    //End admin


    $match = $router->match();
    if( is_array($match) && is_callable( $match['target']) ) {
        call_user_func_array( $match['target'], $match['params'] ); 
    } else {
        // header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        require('view/404.php');
    }
}