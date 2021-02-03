<?php
// var_dump($post);
$titlePage = $post['title'];
$shortDescription = $post['short_description'];

ob_start();
?>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <h4><?= $post['title']?></h4>
            <div class="row justify-content-between">
                <div class="col-lg-3">
                    <p>Auteur : <?= $post['pseudo']?></p>
                </div>
                <div class="col-lg-5 justify-content-end">
                    <p>Publié le : <?php $objDate = new DateTime($post['publication_date']);  echo $objDate->format('d F Y') ;?> 
                    <?php if($post['last_update'] !== NULL): $objDate = new DateTime($post['last_update']);  echo '& Mis à jour le : '. $objDate->format('d F Y'); endif;?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <p><?= $post['content'] ?></p>
            
           
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <h5>Ajouter un commentaire :</h5>
            <form action="/insertComment/<?= $id?>" method="POST">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="pseudo">Votre pseudo : </label>
                        <input type="text" class="input form-control" placeholder="Votre Pseudo"name="pseudo" required <?php if(isset($_SESSION['pseudo'])){echo "value='".$_SESSION['pseudo']."' readonly";}?>>
                    </div>
                        <?php
                        if(!isset($_SESSION['pseudo']) && !isset($_SESSION['email'])){
                            ?>
                            <div class="from-group">
                                <label for="email">Votre email : </label>
                                <input type="text" name="email" class="input form-control" placeholder="Votre email" required class="form-control">
                            </div>
                            <?php
                        }
                        ?>
                    <div class="form-group">
                        <label for="comment">Votre commentaire :</label>
                        <input type="text" name="comment" class="input form-control" placeholder="Votre commentaire" required>
                    </div>
                    <button type="submit" class="btn btn-dark">Publier</button><?php if(isset($elements['info'])){echo '<p>'.$elements['info'].'</p>';}?>
                </div>
            </form>
        </div>
    </div>

    <div class="row justify-content-center mt-5 ">
        <div class="col-lg-8 mb-3">
            <h5>Commentaires :</h5>
        </div>

        <div class="col-lg-8 mb-5">
            <?php
            if($comments == []){
                ?>
                <div class="row">
                    <div class="col-lg-8">
                        <p>Aucun commentaire de publié pour cet article. Soyer le premier à en publier un !</p>
                    </div>
                </div>
                <?php
            }else{
                foreach($comments as $comment){
                ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <?= $comment['pseudo'] ?>
                        </div>
                        <div class="card-body">
                            <p><?= $comment['comment'] ?></p>
                            <p class="blockquote-footer"><?= $comment['publicationDate']?></p>
                        </div>
                    </div>
                <?php  
                }
            }
            ?>
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col-lg-2 justify-content-end">
            <?php
                if(isset($_SESSION['admin']) && $_SESSION['admin'] === "3"){
                ?>
                <p><a href="/updatePost/<?= $id?>"><button class="btn btn-warning">Modifier l'article</button></a></p>
                <?php
                }
            ?>
        </div>

    </div>

    <?php

$content = ob_get_clean();

require('template/templatePage.php');

// date('Y-m-d H:i:s', $date);

// $objDate = new \DateTime($post['publication_date']);  echo $objDate->format('d-m-Y')