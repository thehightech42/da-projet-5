<?php
namespace App\controler;
use App\model\PostModel;
use App\model\UserModel;
use App\utile\Security;

class PostControler{

    function __construct(){
        $this->_postModel = new PostModel;
        $this->_token = Security::generateToken();
    }

    public function createPost(){
        require('view/createPost.php');
    }

    public function insertPost($elements){
        if(!$elements['statusPost']){
            $insertPostDaft = $this->_postModel->insertPostDaft( $elements['titlePost'], $elements['shortDescription'], $elements['content']);
            if(!$insertPostDaft){
                $this->returnPagePost($elements, '/createPost');
            }else{
                header('Location: /admin/posts');
            }
        }else{
            $insertPostPublish = $this->_postModel->insertPostPublish( $elements['titlePost'], $elements['shortDescription'], $elements['content']);
            if(!$insertPostPublish){
                $this->returnPagePost($elements, '/createPost');
            }else{
                // Envoyer vers l'article publié
                header('Location: /');
            }
        }

    }

    public function postsList(){
        $posts = $this->_postModel->postsList(); 
        if($posts === false){
            $elements['info'] = "Aucun article de publié. Merci de revenir plus tard ou de contacter l'admnistrateur si le problème perssiste.";
        }
        require('view/postsList.php');

        
    }

    public function returnPagePost($elements, $road){
        if(isset($elements['titlePost']) && isset($elements['shortDescription']) && isset($elements['content'])){
            $_SESSION['titlePost'] = $elements['titlePost'];
            $_SESSION['shortDescription'] = $elements['shortDescription'];
            $_SESSION['content'] = $elements['content'];
        }
        if(isset($elements['info'])){
            $_SESSION['info'] = $elements['info'];
        }
        header('Location: '.$road.'');
    }

    public function post($id, $elements = null){
        $post = $this->_postModel->post($id); // Get post

        $commentsBrut = $this->_postModel->selectCommentOfPost($id); //Get comment

        // Création of a new array of comment
        $comments = [];
        // var_dump($commentsBrut);
        if($commentsBrut !== true){
            foreach($commentsBrut as $commentBrut){
                if(!isset($commentBrut['pseudo']) && !isset($commentBrut['email'])){
                    $userModel = new UserModel;
                    $infoUser = $userModel->selectUserInfoWithId($commentBrut['id_user']);
                    if($infoUser !== false && isset($infoUser['pseudo'])){
                        $comment['pseudo'] = $infoUser['pseudo'];
                    }
                }else{
                    $comment['pseudo'] = $commentBrut['pseudo'];
                }
                $comment['comment'] = $commentBrut['comment'];
                $objDate = new \DateTime($commentBrut['publication_date']);
                $comment['publicationDate'] = "Publié : ".$objDate->format('l d F Y à G \h i');
                array_push($comments, $comment);
            }
    
        }
        
        if(!$post){
            require('view/404.php');
        }else{
            require('view/post.php');
        }
    }

    public function updatePost($elements){
        if(!isset($elements['titlePost'])){
            $updatePost = $this->_postModel->updatePost($elements['id']);
            if(!$updatePost){
                require('view/404.php');
            }else{
                $elements['titlePost'] = $updatePost['title'];
                $elements['shortDescription'] = $updatePost['short_description'];
                $elements['content'] = $updatePost['content'];
                require('view/updatePost.php');
            }
        }else{
            require('view/updatePost.php');
        }
    }

    public function insertUpdatePost($title, $shortDescription, $content, $id, $statusPost){
        $elements['titlePost'] = $title;
        $elements['shortDescription'] = $shortDescription;
        $elements['content'] = $content;
        if(!$statusPost){
            $insertUpdatePostDaft = $this->_postModel->insertUpdatePostDaft($title, $shortDescription, $content, $id);
            if($insertUpdatePostDaft){ //Mise en brouillon
                unset($elements);
                $elements['info'] = 'Les modifications apportés à votre articles ont bien été enregistré en brouillons.';
                $this->returnPagePost($elements, '/updatePost/'.$id.'');
            }else{
                $elements['info'] = "Un echet c'est produit dans l'enregistrement. Merci de réesayer ou de contacter l'administrateur du site si le problème persiste.";
                $this->returnPagePost($elements, '/updatePost/'.$id.'');
            }
        }else{ // Publication de la mise à jour
            $tryPublicationDate = $this->_postModel->tryPublicationDate($id);
            if($tryPublicationDate){ // Ajout d'une last_update - Mise à jours
                $insertUpdatePostPublishSecond = $this->_postModel->insertUpdatePostPublishSecond($title, $shortDescription, $content, $id);
                if($insertUpdatePostPublishSecond){
                    unset($elements);
                    $elements['info'] = "Votre article a bien été mis à jours";
                    $this->returnPagePost($elements, '/post/'.$id.'');
                }else{
                    $elements['info'] = "Un echec lors de la mise à jours a été détecté. Merci de réessayer ou de contacter l'administrateur.";
                    $this->returnPagePost($elements, '/updatePost/'.$id.'');
                }
            }else{ // Ajout de la date de publication - Première publication
                $insertUpdatePostPublishFirst = $this->_postModel->insertUpdatePostPublishFirst($title, $shortDescription, $content, $id);
                if($insertUpdatePostPublishFirst){
                    unset($elements);
                    $elements['info'] = "Votre article a bien été publié";
                    $this->returnPagePost($elements, '/post/'.$id.'');
                }else{
                    $elements['info'] = "Un echec lors de la mise à jours a été détecté. Merci de réessayer ou de contacter l'administrateur.";
                    $this->returnPagePost($elements, '/updatePost/'.$id.'');
                }
            }
        }
    }

    public function insertComment($elements){
        if(isset($elements['email'])){
            $insertCommentNoUser = $this->_postModel->inserCommentNoUser($elements['idPost'], $elements['pseudo'], $elements['email'], $elements['comment']); 
            if(!$insertCommentNoUser){
                $_SESSION['info'] = "Une erreur c'est produite lors de l'enregistrement de votre commentaire. Merci de réessayer ou de contacter l'administrateur.";
            }
        }else{
            $insertCommentUser = $this->_postModel->insertCommentUser($elements['idPost'], $_SESSION['id_user'], $elements['comment']);
            if(!$insertCommentUser){
                $_SESSION['info'] = "Une erreur c'est produite lors de l'enregistrement de votre commentaire. Merci de réessayer ou de contacter l'administrateur.";
            }
        }
        if(!isset($_SESSION['info'])){
            $_SESSION['info'] = "Votre commentaire a bien été enregistré. Dès validations vous pourrez le retrouver ci dessous.";
        } 
        header('Location: /post/'.$elements['idPost'].'');
    }

    public function commentModeration($elements = null){
        $selectCommentNotModerate = $this->_postModel->selectCommentNotModerate();
        $allInformationOfComments = [];
        if($selectCommentNotModerate === false){
            $elements['infoRecuperation'] = "Une erreur c'est produite lors de la récupération des commentaires à modérer. Merci de contacter l'administrateur";
        }else if($selectCommentNotModerate === true){
            $elements['infoRecuperation'] = "Actuellement aucun commentaire n'est à modérer.";
        }else{
            foreach($selectCommentNotModerate as $commentBrut){
                $comment = [];
                $titlePostReq = $this->_postModel->post($commentBrut['post_id']);
                if($titlePostReq !== false){
                    $comment['titlePost'] = $titlePostReq['title'];
                }else{
                    $comment['titlePost'] = "Echec récupération";
                }
                if(isset($commentBrut['id_user']) && !isset($commentBrut['pseudo']) && !isset($commentBrut['email'])){
                    $userModel = new UserModel;
                    $infoUserReq = $userModel->selectUserInfoWithId($commentBrut['id_user']);
                    if($infoUserReq !== false){
                        $comment['pseudo'] =  $infoUserReq['pseudo'];
                        $comment['email'] =  $infoUserReq['email'];
                    }else{
                        $comment['pseudo'] =  "Echec récupération";
                        $comment['email'] =  "Echec récupération";
                    }
                }else{
                    $comment['pseudo'] = $commentBrut['pseudo'];
                    $comment['email'] = $commentBrut['email'];
                }
                $objDate = new \DateTime($commentBrut['publication_date']);
                $comment['publicationDate'] = $objDate->format('d - m - Y');
                $comment['comment'] = $commentBrut['comment'];
                $comment['id'] = $commentBrut['id'];
                $comment['postId'] = $commentBrut['post_id'];
                array_push($allInformationOfComments, $comment);
            }
        }
        require('view/commentModeration.php');
    }

    public function removeComment($id){
        $removeComment = $this->_postModel->removeComment($id);
        if($removeComment === false){
            $_SESSION['info'] = "Erreur lors de la suppression du commentaire";
        }else{
            $_SESSION['info'] = "La suppression du commentaire a bien été effectué.";
        }
        header('Location: /admin/commentModeration');
    }

    public function checkComment($id){
        $checkComment = $this->_postModel->checkComment($id);
        if($checkComment === false){
            $_SESSION['info'] = "Erreur lors de la validation du commentaire";
        }else{
            $_SESSION['info'] = "La validation du commentaire a bien été effectué.";
        }
        header('Location: /admin/commentModeration');
    }

    public function adminPosts($elements = null){
        $getPosts = $this->_postModel->getPosts();
        if($getPosts === false){
            $elements['infoRecuperation'] = "Une erreur c'est produite dans la récupération de vos données";
        }else if($getPosts === true){
            $elements['infoRecuperation'] = "Actuellement aucun article n'est présent dans la base de donnée.";
        }else{
            $posts = [];
            foreach($getPosts as $postReq){
                $post['id'] = $postReq['id'];
                $post['title'] = $postReq['title'];
                $post['pseudo'] = $postReq['pseudo'];
                $objDate = new \DateTime($postReq['publication_date']);
                $post['publicationDate'] = $objDate->format('d - m - Y');

                if($postReq['post_status'] === '1'){
                    $post['status'] = "Publié";
                }else{
                    $post['status'] = "Brouillon";
                }
                array_push($posts, $post);
            }
            require('view/adminPost.php');
        }   
    }

    public function deletePost($id){
        $deletePost = $this->_postModel->deletePost($id);
        if($deletePost === false){
            $_SESSION['info'] = "Un echec lors de la suppression de l'article à eu lieu. Merci de réessayer ou de contacter l'administrateur si cela continu";
        }else{
            $_SESSION['info'] = "L'article à bien été supprimé";
        }
        header('Location: /admin/posts');
    }

}