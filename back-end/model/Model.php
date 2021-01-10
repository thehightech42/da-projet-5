<?php
namespace App\model;



class Model{
    public $_bdd;

    function __construct(){
        $this->_bdd = $this->AccesBDD();
    }

    private function AccesBDD(){
        require('../config.php');
        try{
            $bdd = new \PDO("mysql:host=".$domaineBDD.";dbname=".$BDDName.";charset=utf8",$username, $password);
        }catch(\Exception $e){
            throw new \Exception ('Une erreur est survenue lors de la connexion à la base de donnée. Merci de contacter l\'administrateur du site');
        }
        return $bdd;
    }

}