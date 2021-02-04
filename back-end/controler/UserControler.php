<?php
namespace App\controler;
use App\model\UserModel;
use App\utile\Token;

class UserControler{

    function __construct(){
       $this->_userModel = new UserModel;
       $this->_token = Token::generateToken();
    }

    public function account(){
        require("view/account.php");
    }

    public function insertUser($elements){
        
        $tryEmail = $this->_userModel->tryEmail($elements['email']);
        $tryPseudo = $this->_userModel->tryPseudo($elements['pseudo']);

        $passwordInfo = true;
        if($elements['password1'] !== $elements['password2']){ // Vérification du mot de passe
            $passwordInfo = false;
        }

        if($tryEmail && $tryPseudo && $passwordInfo){
            $add = $this->_userModel->addUser($elements['pseudo'], $elements['email'], password_hash($elements['password1'], PASSWORD_DEFAULT));
            if($add){
                $_SESSION['info']['registration'] = "Votre inscription a bien été pris en compte, vous pouvez à présent vous connecter !";
            }else{
                $elements['info']['registration'] = "Il y a eu un souci lors de votre inscription. Nous vous invitions a essayer ultérieurement ou à contacter l'administrateur du site. ";
                $_SESSION['email'] = $elements['email'];
                $_SESSION['pseudo'] = $elements['pseudo'];
            }
        }else{
            $_SESSION['info']['registration'] = "Les informations fourni, ne nous permette pas de vous inscrire. Votre pseudo et adresse mail doivent être unique à chaque utilisateur. Et votre mot de passe dois être identique.";
            if($tryEmail === true){ 
                $_SESSION['email'] = $elements['email'];
            }
            if($tryPseudo === true){
                $_SESSION['pseudo'] = $elements['pseudo'];
            }
        }
        header('Location: /account');
    }

    public function connection($elements){
        $findId = $this->_userModel->findIdWithPseudo($elements['pseudo']);
        $infoCo = "";
        if($findId === false){
            $_SESSION['info']['connection'] = "Votre pseudo n'a pas été trouvé.";  
            header('Location: /user/account', TRUE);
        }else{
            $findPassword = $this->_userModel->selectPasswordHash($findId);
            if($findPassword === false){
                $_SESSION['info']['connection'] = "Une erreur c'est produite. Merci de contacter l'administrateur.";
                header('Location: /user/account', TRUE);
            }else{
                $checkPassword = password_verify($elements['password'], $findPassword);
                if($checkPassword === false){
                    $_SESSION['info']['connection'] = "Votre mot de passe ne correspond pas.";
                    header('Location: /user/account', TRUE);
                }else{
                    $findEmail = $this->_userModel->selectEmail($findId);
                    if($findEmail === false){
                        $_SESSION['info']['connection'] = "Une erreur c'est produite. Merci de contacter l'administrateur.";  
                        header('Location: /user/account', TRUE);  
                    }else{
                        $userType = $this->_userModel->selectUserType($findId);
                        if($userType === false){
                            $_SESSION['info']['connection'] = "Une erreur c'est produite. Merci de contacter l'administrateur.";
                            header('Location: /user/account', TRUE);
                        }else{
                            $_SESSION['pseudo'] = $elements['pseudo'];
                            $_SESSION['id_user'] = $findId;
                            $_SESSION['email'] = $findEmail;
                            $_SESSION['admin'] = $userType;
                            header('Location: /user/my-account', TRUE);
                        }
                    }
                }
            }
        }
    }

    public function logOut(){
        $_SESSION = array();
        session_destroy();
        header('Location: /');
    }

    public function myAccount($info = null){
        $elementsGet = $this->_userModel->selectUserInfo();
        if($elementsGet === false){
            $elements['info']['userGet'] = "Une erreur c'est produite dans le chargement de vos informations. Merci de contacter l'administrateur du site.";
        }else{
            $elements['email'] = $elementsGet['email'];
            $elements['pseudo'] = $elementsGet['pseudo'];
            $elements['first_name'] = $elementsGet['first_name'];
            $elements['last_name'] = $elementsGet['last_name'];
        }
        $elements['info'] = $info;
        require('view/my-account.php');
    }

    public function updateUserInformation($elements){
        echo "Test1";
        $arrayCheckUniqueInformation = $this->checkUniqueInformation($elements['pseudo'], $elements['email']);
        if($arrayCheckUniqueInformation['pseudo'] && $arrayCheckUniqueInformation['email']){
            $updateUserInformation = $this->_userModel->updateUserInformation($elements['first_name'], $elements['last_name'], $elements['email'], $elements['pseudo']); 
            if($updateUserInformation === false){
                echo "Test2";
                $_SESSION['info']['userGet'] = "Une erreur c'est produit dans l'enregistrement de la mise à jours de vos informations. Merci de contacter l'administrateur.";
            }else{
                echo "Test3";
                $_SESSION['info']['userGet'] = "Vos modifications ont bien été enregistré."; 
                $userInformation = $this->_userModel->selectUserInfo();
            }
        }else{
            if($arrayCheckUniqueInformation['pseudo'] === false){
                echo "Test4";
                $_SESSION['info']['userGet'] = "Le pseudo choisi est déjà utilisé par un autre utilisateur. Merci d'en choisir un autre.";
            }else{
                echo "Test5";
                $_SESSION['info']['userGet'] = "L'email choisi est déja utilisé par un autre utilisateur. Merci d'en choisir un autre.";
            }
        }
        header('Location: /user/my-account', true);
    }

    private function checkUniqueInformation($pseudo, $email){
        $forPseudo = true;
        $forEmail = true;
        if($pseudo !== $_SESSION['pseudo']){
            $forPseudo = $this->_userModel->tryUpdatePseudo($pseudo, $_SESSION['id_user']);
        }
        if($pseudo !== $_SESSION['email']){
            $forEmail = $this->_userModel->tryUpdateEmail($email, $_SESSION['id_user']);
        }
        return ['pseudo'=>$forPseudo, "email"=>$forEmail];

    }

    public function updatePassword($elements){
        if($elements['password1'] !== $elements['password2']){
            $_SESSION['info']['password'] = "Vos nouveaux mot de passe ne sont pas identiques.";
        }else{
            $lastPasswordSave = $this->_userModel->selectPasswordHash($_SESSION['id_user']);
            if(!password_verify($elements['lastPassword'], $lastPasswordSave) ){
                $_SESSION['info']['password'] = "Votre ancien mot de passe ne correspond pas à celui enregistré.";
            }else{
                $updatePassword = $this->_userModel->updatePassword( password_hash($elements['password1'], PASSWORD_DEFAULT), $_SESSION['id_user']);
                if(!$updatePassword){
                    $_SESSION['info']['password'] = "Une erreur c'est produite lors de l'enregistrement de votre nouveau mot de passe. Merci de contacter l'administateur du site.";
                }else{
                    $_SESSION['info']['password'] = 'Votre mot de passe a bien été changé !';
                }
            }
        }
        header('Location: /user/my-account');
    }

    public function contact($elements = null){
        require('view/contact.php');
    }

    public function sendMailContact($elements){
        $contenu = 
        "<html>
            <head>

            </head>
            <body>
                <h2>Nom :</h2>
                <p>". $elements["first&last_name"] ."</p>
                <hr>
                <h2>Email du contact :</h2>
                <p>". $elements["email"]."</p>
                <hr>
                <h2>Contenu</h2>
                <p>". $elements["content_message"] ."</p>
            </body>
        </html>";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: ' . $elements["email"] . "\r\n";

        $mail = mail('contact@antoninpfistner.fr', "Message du site projet-5.antoninpfistner.fr", $contenu, $headers );
        if($mail){
            $_SESSION['infoContact'] = "Votre message à bien été envoyé !";

        }else{
            $_SESSION['infoContactUser']['name'] = $elements["first&last_name"];
            $_SESSION['infoContactUser']['email'] = $elements["email"];
            $_SESSION['infoContactUser']['content'] = $elements["content_message"];
            $_SESSION['infoContact'] = error_get_last()['message'];
        }
        if( isset($elements["home"]) ){
            header('Location: /#contact');
        }else{
            header('Location: /contact');
        }
    }

}