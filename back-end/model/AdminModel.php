<?php
namespace App\model;

class AdminModel extends Model{

    public function countPublishedPost(){
        $countPublishedPost = $this->_bdd->prepare("SELECT COUNT(*) FROM post WHERE post_status = 1");
        $countPublishedPost->execute();
        if($countPublishedPost === false){
            return false;
        }else{
            return $countPublishedPost->fetch();
        }
    }

    public function countDaftPost(){
        $countDaftPost = $this->_bdd->prepare("SELECT COUNT(*) FROM post WHERE post_status = 0");
        $countDaftPost->execute();
        if($countDaftPost === false){
            return false;
        }else{
            return $countDaftPost->fetch();
        }
    }

    public function countPost(){
        $countPost = $this->_bdd->prepare("SELECT COUNT(*) FROM post");
        $countPost->execute();
        if($countPost === false){
            return false;
        }else{
            return $countPost->fetch();
        }
    }

    public function countCommentWaiting(){
        $countCommentWaiting = $this->_bdd->prepare("SELECT COUNT(*) FROM comment WHERE comment_status = 0");
        $countCommentWaiting->execute();
        if($countCommentWaiting === false){
            return false;
        }else{
            return $countCommentWaiting->fetch();
        }
    }

    public function countCommentValidated(){
        $countCommentValidated = $this->_bdd->prepare("SELECT COUNT(*) FROM comment WHERE comment_status = 1");
        $countCommentValidated->execute();
        if($countCommentValidated === false){
            return false;
        }else{
            return $countCommentValidated->fetch();
        }
    }

    public function countComment(){
        $countComment = $this->_bdd->prepare("SELECT COUNT(*) FROM comment");
        $countComment->execute();
        if($countComment === false){
            return false;
        }else{
            return $countComment->fetch();
        }
    }


}