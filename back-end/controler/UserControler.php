<?php
namespace App\controler;
use App\model\UserModel;

class UserControler{

    function __construct(){
       $this->_userModel = new UserModel;
    }

    static function test($test){
        require('../public/view/home.php');
    }

    public function addUser($email, $pseudo, $password1, $password2){
        $tryEmail = $this->_userModel->tryEmail($email);
        $tryPseudo = $this->_userModel->tryPseudo($pseudo);
        if($tryEmail === false){
            $email = null;
        }
        if($tryPseudo === false){
            $pseudo = null;
        }
        $passwordInfo = true;
        if($password1 !== $password2){
            $passwordInfo = false;
        }

        if($tryEmail && $tryPseudo && $passwordInfo){
            $add = $this->_userModel->addUser($pseudo, $email, password_hash($password1, PASSWORD_DEFAULT));
            if($add){
                $_SESSION['addUserInfo'] = "Votre inscription a bien été pris en compte, vous pouvez à présent vous connecter !";
                $userInfo = 0;
            }else{
                $_SESSION['addUserInfo'] = "Il y a eu un souci lors de votre inscription. Nous vous invitions a essayer ultérieurement ou à contacter l'administrateur du site. ";
                echo "Echec de l'ajout à la base de donnée";
            }
        }else{
            $_SESSION['addUserInfo'] = "Les informations fourni, ne nous permette pas de vous inscrire. Votre pseudo et adresse mail doivent être unique à chaque utilisateur. Et votre mot de passe dois être identique.";
            $_SESSION['graspedUserInfo'] = ["email"=>$email, "pseudo"=>$pseudo, 'password'=>$passwordInfo];
        }
        header('Location: /account');
    }

    public function logIn($pseudo, $password){
        $findId = $this->_userModel->findIdWithPseudo($pseudo);
        if($findId === false){
            $userConnexionInfo = "Une erreur c'est produite lors de votre connexion. Veuillez contrôler votre pseudo ou merci de contacter l'administrateur.";
            require('view/account.php');
        }else{
            $findPassword = $this->_userModel->selectPasswordHash($findId);
            if($findPassword === false){
                $userConnexionInfo = "Une erreur c'est produite lors de votre connexion. Merci de contacter l'administrateur.";
                require('view/account.php');
            }else{
                $checkPassword = password_verify($password, $findPassword);
                if($checkPassword){
                    $findEmail = $this->_userModel->selectEmail($findId);
                    if($findEmail === false){
                        $userConnexionInfo = "Une erreur c'est produite lors de votre connexion. Merci de contacter l'administrateur.";
                        require('view/account.php');
                    }else{
                        $_SESSION['pseudo'] = $pseudo;
                        $_SESSION['id'] = $findId;
                        $_SESSION['email'] = $findEmail['email'];
                        header('Location: /', TRUE);
                    }
                }else{
                    $userConnexionInfo = "Votre mot de passe est incorret";
                    require('view/account.php');
                }
            }
        }
    }

    public function logOut(){
        $_SESSION = array();
        session_destroy();
        header('Location: /');
    }

    public function myAccount(){
        $userInformation = $this->_userModel->selectUserInfo();
        if($userInformation === false){
            $_SESSION['infoUserUpdate'] = "Une erreur c'est produite dans le chargement de vos informations. Merci de contacter l'administrateur du site.";
        }
        require('view/my-account.php');
    }

    public function updateUserInformation($first_name, $last_name, $email, $pseudo){
        $arrayCheckUniqueInformation = $this->checkUniqueInformation($pseudo, $email);
        $_SESSION['infoUserUpdate'] = false;
        if($arrayCheckUniqueInformation['pseudo'] && $arrayCheckUniqueInformation['email']){
            $updateUserInformation = $this->_userModel->updateUserInformation($first_name, $last_name, $email, $pseudo); 

            if($updateUserInformation === false){
                $_SESSION['infoUserUpdate'] = "Une erreur c'est produit dans l'enregistrement de la mise à jours de vos informations. Merci de contacter l'administrateur.";
            }else{
                $_SESSION['infoUserUpdate'] = "Vos modifications ont bien été enregistré."; 
                $userInformation = $this->_userModel->selectUserInfo();
            }
        }else{
            if($arrayCheckUniqueInformation['pseudo'] === false){
                $_SESSION['infoUserUpdate'] = "Le pseudo choisi est déjà utilisé par un autre utilisateur. Merci d'en choisir un autre";
            }else{
                $_SESSION['infoUserUpdate'] = "L'email choisi est déja utilisé par un autre utilisateur. Merci d'en choisir un autre";
            }
        }
        $userInformation = $this->_userModel->selectUserInfo();
        header('Location: /my-account', true);
    }

    private function checkUniqueInformation($pseudo, $email){
        $forPseudo = true;
        $forEmail = true;
        if($pseudo !== $_SESSION['pseudo']){
            $forPseudo = $this->_userModel->tryUpdatePseudo($pseudo, $_SESSION['id']);
        }
        if($pseudo !== $_SESSION['email']){
            $forEmail = $this->_userModel->tryUpdateEmail($email, $_SESSION['id']);
        }
        return ['pseudo'=>$forPseudo, "email"=>$forEmail];

    }

    public function updatePassword($lastPassword, $password1, $password2){
        
        if($password1 !== $password2){
            $_SESSION['userPasswordInfo'] = "Vos nouveaux mot de passe ne sont pas identiques.";
        }else{
            $lastPasswordSave = $this->_userModel->selectPasswordHash($_SESSION['id']);
            if( !password_verify($lastPassword, $lastPasswordSave) ){
                $_SESSION['userPasswordInfo'] = "Votre ancien password ne correspond pas à celui enregistré.";
            }else{
                $updatePassword = $this->_userModel->updatePassword( password_hash($password1, PASSWORD_DEFAULT), $_SESSION['id']);
                if(!$updatePassword){
                    $_SESSION['userPasswordInfo'] = "Une erreur c'est produite lors de l'enregistrement de votre nouveau mot de passe. Merci de contacter l'administateur du site.";
                }else{
                    $_SESSION['userPasswordInfo'] = 'Votre mot de passe a bien été changé !';
                }
            }
        }
        header('Location: /my-account');
    }
}