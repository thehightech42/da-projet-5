<?php
namespace App\model;

class UserModel extends Model{

    public function tryPseudo($pseudo){
        $tryFindPseudo = $this->_bdd->prepare('SELECT id FROM user WHERE pseudo = :pseudo');
        $tryFindPseudo->execute(['pseudo'=>$pseudo]);
        if($tryFindPseudo === false || $tryFindPseudo->rowcount() > 0){
            return false;
        }else{
            return true;
        }
    }

    public function tryUpdatePseudo($pseudo, $id){
        $tryUpdatePseudo = $this->_bdd->prepare('SELECT id FROM user WHERE pseudo = :pseudo AND id != :id');
        $tryUpdatePseudo->execute(['pseudo'=>$pseudo, 'id'=>$id]);
        if($tryUpdatePseudo === false || $tryUpdatePseudo->rowcount() > 0){
            return false;
        }else{
            return true;
        }
    }

    public function tryEmail($email){
        $tryFindEmail = $this->_bdd->prepare('SELECT id FROM user WHERE email = :email');
        $tryFindEmail->execute(['email'=>$email]);
        if($tryFindEmail === false || $tryFindEmail->rowcount() > 0){
            return false;
        }else{
            return true;
        }
    }

    public function tryUpdateEmail($email, $id){
        $tryUpdateEmail = $this->_bdd->prepare('SELECT id FROM user WHERE email = :email AND id != :id');
        $tryUpdateEmail->execute(['email'=>$email, 'id'=>$id]);
        if($tryUpdateEmail === false || $tryUpdateEmail->rowcount() > 0){
            return false;
        }else{
            return true;
        }
    }

    public function addUser($pseudo, $email, $passHash){
        $addUser = $this->_bdd->prepare("INSERT INTO user(pseudo, email, pass_hash, id_user_type ,account_creation_date) VALUES (:pseudo, :email, :pass_hash, 1, NOW())"); 
        $addUser->execute(array('pseudo' => $pseudo, 'email' => $email, 'pass_hash' => $passHash));
        if($addUser === false || $addUser->rowcount() !== 1 ){
            return false;
        }else{
            return true;
        }
    }

    public function findIdWithPseudo($pseudo){
        $findIdWithPseudo = $this->_bdd->prepare('SELECT id FROM user WHERE pseudo = :pseudo');
        $findIdWithPseudo->execute(['pseudo' => $pseudo]);
        if($findIdWithPseudo->rowcount() !== 1 || $findIdWithPseudo === false){
            return false;
        }else{
            $idUser = $findIdWithPseudo->fetch();
            return $idUser['id'];
        }
    }


    public function selectPasswordHash($id){
        $selectPasswordHash = $this->_bdd->prepare('SELECT pass_hash FROM user WHERE id = :id');
        $selectPasswordHash->execute(['id'=> $id]);
        if($selectPasswordHash->rowcount() !== 1 || $selectPasswordHash === false){
            return false;
        }else{
            $hash = $selectPasswordHash->fetch();
            return $hash['pass_hash'];
        }
        
    }

    public function selectUserInfo(){
        $selectUserInfo = $this->_bdd->prepare('SELECT first_name, last_name, email, pseudo FROM user WHERE id = :id'); 
        $selectUserInfo->execute(['id'=>$_SESSION['id']]); 
        if($selectUserInfo->rowcount() !== 1 || $selectUserInfo === false){
            return false;
        }else{
            $userInfo = $selectUserInfo->fetch();
            return $userInfo;
        }
    }

    public function selectEmail($id){
        $selectEmail = $this->_bdd->prepare('SELECT email FROM user WHERE id = :id'); 
        $selectEmail->execute(['id'=>$id]); 
        if( $selectEmail->rowcount() !== 1 || $selectEmail === false){
            return false;
        }else{
            $email = $selectEmail->fetch(); 
            return $email;
        }
    }

    public function updateUserInformation($first_name, $last_name, $email, $pseudo){
        $updateUserInformation = $this->_bdd->prepare('UPDATE user SET first_name = :first_name, last_name = :last_name, email = :email, pseudo = :pseudo WHERE id = :id');
        $updateUserInformation->execute(['first_name'=>$first_name, 'last_name'=>$last_name, 'email'=>$email, 'pseudo'=>$pseudo, 'id'=>$_SESSION['id']]);
        if($updateUserInformation->rowcount() !== 1 || $updateUserInformation === false ){
            return false;
        }else{
            return true;
        }
    }

    public function updatePassword($newPasswordHash, $id){
        $updatePassword = $this->_bdd->prepare('UPDATE user SET pass_hash = :pass_hash WHERE id = :id'); 
        $updatePassword->execute(['pass_hash' => $newPasswordHash, 'id' => $id]);
        if($updatePassword->rowcount() !== 1 || $updatePassword === false){
            return false;
        }else{
            return true;
        }
    }

    public function selectUserType($id){
        $selectUserType = $this->_bdd->prepare('SELECT id_user_type FROM user WHERE id = :id'); 
        $selectUserType->execute(['id'=>$id]);
        if($selectUserType->rowcount() !== 1 || $selectUserType === false){
            return false;
        }else{
            $idUserType = $selectUserType->fetch();
            return $idUserType['id_user_type'];
        }
    }
}