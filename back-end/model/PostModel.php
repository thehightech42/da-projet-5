<?php
namespace App\model;

class PostModel extends Model{

      public function insertPostDaft($title, $shortDescription, $content){
            $insertPost = $this->_bdd->prepare('INSERT INTO post(title, short_description, id_user, content, post_status) VALUES (:title, :short_description, :id_user, :content, 0)');
            $insertPost->execute(['title'=>$title, 'short_description'=>$shortDescription, 'id_user'=>$_SESSION['id_user'], 'content'=>$content]);
            // var_dump($insertPost);
            if($insertPost === false || $insertPost->rowcount() !== 1){
                  return false;
            }else{
                  return true;
            }
      }

      public function insertPostPublish($title, $shortDescription, $content){
            $insertPost = $this->_bdd->prepare("INSERT INTO post(title, short_description, id_user, content, publication_date, post_status) VALUES (:title, :short_description, :id_user, :content, NOW(), 1)");
            $insertPost->execute(['title'=>$title, 'short_description'=>$shortDescription, 'id_user'=>$_SESSION['id_user'], 'content'=>$content]);
            // var_dump($insertPost->rowcount());
            if($insertPost === false || $insertPost->rowcount() !== 1){
                  return false;
            }else{
                  return true;
            }
      }

      public function postsList(){
            $postsList = $this->_bdd->prepare('SELECT u.pseudo, p.* FROM user u, post p WHERE post_status = 1 AND p.id_user = u.Id ORDER BY publication_date DESC');
            $postsList->execute();
            if($postsList === false || $postsList->rowcount() === 0){
                  return false;
            }else{
                  if( $postsList->rowcount() === 1){
                        return $postsList->fetch();
                  }else{
                        return $postsList->fetchAll();
                  }
                  
            }
      }

      public function post($id){
            $post = $this->_bdd->prepare('SELECT u.pseudo, p.* FROM user u, post p WHERE u.id = p.id_user AND p.id = :id AND post_status = 1');
            $post->execute(['id' => $id]);
            if($post === false || $post->rowcount() !== 1){
                  return false;
            }else{
                  return $post->fetch();
            }
      }

      public function updatePost($id){
            $updatePost = $this->_bdd->prepare('SELECT title, short_description, content FROM post WHERE id = :id'); 
            $updatePost->execute(['id'=>$id]);
            if($updatePost === false || $updatePost->rowcount() !== 1){
                  return false;
            }else{
                  return $updatePost->fetch();
            }
      }

      public function tryPublicationDate($id){
            $tryPublicationDate = $this->_bdd->prepare('SELECT publication_date FROM post WHERE id = :id');
            $tryPublicationDate->execute(['id'=>$id]);
            $try = $tryPublicationDate->fetch();
            if($tryPublicationDate === false || ($tryPublicationDate->rowcount() === 1 && $try['publication_date'] === NULL)){
                  return false; // Echec ou d'absence de date de publication
            }else{
                  return true; // Si présence de date de publication
            }
      }

      public function insertUpdatePostDaft($title, $shortDescription, $content, $id){
            $insertUpdatePostDaft = $this->_bdd->prepare('UPDATE post SET title = :title, short_description = :shortDescription, content = :content, post_status = 0 WHERE id = :id');
            $insertUpdatePostDaft->execute(['title'=>$title, 'shortDescription'=>$shortDescription, 'content'=>$content, 'id'=>$id]); 
            if($insertUpdatePostDaft === false || $insertUpdatePostDaft->rowcount() !== 1){
                  return false;
            }else{
                  return true;
            }
      }

      public function insertUpdatePostPublishFirst($title, $shortDescription, $content, $id){
            $insertUpdatePostDaft = $this->_bdd->prepare('UPDATE post SET title = :title, short_description = :shortDescription, content = :content, publication_date = NOW(), post_status = 1 WHERE id = :id');
            $insertUpdatePostDaft->execute(['title'=>$title, 'shortDescription'=>$shortDescription, 'content'=>$content, 'id'=>$id]); 
            if($insertUpdatePostDaft === false || $insertUpdatePostDaft->rowcount() !== 1){
                  return false;
            }else{
                  return true;
            }
      }

      public function insertUpdatePostPublishSecond($title, $shortDescription, $content, $id){
            $insertUpdatePostDaft = $this->_bdd->prepare('UPDATE post SET title = :title, short_description = :shortDescription, content = :content, last_update = NOW(), post_status = 1 WHERE id = :id');
            $insertUpdatePostDaft->execute(['title'=>$title, 'shortDescription'=>$shortDescription, 'content'=>$content, 'id'=>$id]); 
            if($insertUpdatePostDaft === false || $insertUpdatePostDaft->rowcount() !== 1){
                  return false;
            }else{
                  return true;
            }
      }

      public function inserCommentNoUser($post_id, $pseudo, $email, $comment){
            $insertCommentNoUser = $this->_bdd->prepare("INSERT INTO comment (post_id, pseudo, email, comment_status, comment, publication_date) VALUES (:post_id, :pseudo, :email,  0, :comment, NOW() )"); 
            $insertCommentNoUser->execute(["post_id"=>$post_id, "pseudo"=>$pseudo, "email"=>$email, "comment"=>$comment]); 
            if($insertCommentNoUser === false || $insertCommentNoUser->rowcount() !== 1){
                  return false;
            }else{
                  return true;
            }

      }

      public function insertCommentUser($idPost, $idUser, $comment){
            // echo $comment;
            $insertCommentUser = $this->_bdd->prepare("INSERT INTO comment (post_id, id_user, comment_status, comment, publication_date) VALUES (:post_id, :id_user, 0, :comment, NOW() )"); 
            $insertCommentUser->execute(["post_id"=>$idPost, "id_user"=>$idUser, "comment"=>$comment]); 
            if($insertCommentUser === false || $insertCommentUser->rowcount() !== 1){
                  return false;
            }else{
                  return true;
            }
      }

      public function selectCommentNotModerate(){
            $selectCommentNotModerate = $this->_bdd->prepare("SELECT * FROM comment WHERE comment_status = 0");
            $selectCommentNotModerate->execute();
            if($selectCommentNotModerate === false){
                  return false;
            }else if($selectCommentNotModerate->rowcount() === 0){
                  return true;
            }else{
                  return $selectCommentNotModerate->fetchAll();
            }
      }

      public function selectCommentOfPost($postId){
            $selectCommentOfPost = $this->_bdd->prepare("SELECT * FROM comment WHERE comment_status = 1 AND post_id = :post_id");
            $selectCommentOfPost->execute(['post_id'=>$postId]);
            if($selectCommentOfPost === false){
                  return false;
            }else if($selectCommentOfPost->rowcount() === 0){
                  return true;
            }else{
                  return $selectCommentOfPost->fetchAll();
            }
      }

      public function removeComment($id){
            $removeComment = $this->_bdd->prepare("DELETE FROM comment WHERE id = :id");
            $removeComment->execute(['id'=>$id]);
            if($removeComment === false){
                  return false;
            }else{
                  return true;
            }
      }

      public function checkComment($id){
            $removeComment = $this->_bdd->prepare("UPDATE comment SET comment_status = 1  WHERE id = :id");
            $removeComment->execute(['id'=>$id]);
            if($removeComment === false){
                  return false;
            }else{
                  return true;
            }
      }

      public function getPosts(){
            $getPost = $this->_bdd->prepare("SELECT p.*, u.pseudo FROM post p, user u WHERE p.id_user = u.Id ORDER BY publication_date DESC");
            $getPost->execute();
            if($getPost === false){
                  return false;
            }else if($getPost->rowcount() === 0){
                  return true;
            }else{
                  return $getPost->fetchAll();
            }
      }

      public function deletePost($id){
            $deletePost = $this->_bdd->prepare("DELETE FROM post WHERE id = :id");
            $deletePost->execute(['id'=>$id]);
            if($deletePost === false){
                  return false;
            }else{
                  return true;
            }
      }
}