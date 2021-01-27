<?php
namespace App\controler;

use App\model\PostModel;
use App\model\UserModel;
use App\model\AdminModel;

class AdminControler{

    function __construct(){
        $this->_userModel = new UserModel;
        $this->_postModel = new PostModel;
        $this->_adminModel = new AdminModel;
    }

    public function dashboard(){
        $countPublishedPost = $this->_adminModel->countPublishedPost();
        if($countPublishedPost === false){
            $countPublishedPost = "-";
        }
        $countDaftPost =  $this->_adminModel->countDaftPost();
        if($countDaftPost === false){
            $countDaftPost = "-";
        }
        $countPost = $this->_adminModel->countPost();
        if($countPost === false){
            $countPost = "-";
        }


        $countCommentWaiting = $this->_adminModel->countCommentWaiting();
        if($countCommentWaiting === false){
            $countCommentWaiting = "-";
        }
        $countCommentValidated =  $this->_adminModel->countCommentValidated();
        if($countCommentValidated === false){
            $countCommentValidated = "-";
        }
        $countComment = $this->_adminModel->countComment();
        if($countComment === false){
            $countComment = "-";
        }


        require('view/dashboard.php');
    }


}