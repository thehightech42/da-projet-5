<?php

$titlePage = "Modération des commentaire"; 
ob_start();
?>
    <div class="row justify-content-center">
        <div class="col-lg-10"><h5>Modération des commentaires</h5> </div>
        <div class="col-lg-10">
            <p>Avant qu'un commentaire soit affiché publiquement, il doit être validé par vous ainsi que l'ensemble des modérateurs bénévoles de ce site.<br>
            Le but n'est pas de supprimer les commentaires négatifs mais de retirer les commentaires injurieux, dégradants, ...
            Un commentaire négatif expliqué poliment et argumenté doit être publié !</p>
        </div>

        <div class="col-lg-10">
            <?php
                if(isset($elements['infoModification'])){
                    echo '<p>'.$elements['infoModification'].'</p>';
                }
                ?>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titre article</th>
                            <th scope="col">Pseudo</th>
                            <th scope="col">Email</th>
                            <th scope="col">Commentaire</th>
                            <th scope="col">Date de publication</th>
                            <th scope="col">Supprimer</th>
                            <th scope="col">Valider</th>
                        </tr>
                    </thead>
                    <tbody class="table-active">
                        <?php
                        $i = 1;
                        if($allInformationOfComments !== [] && !isset($elements['infoRecuperation'])){
                            foreach($allInformationOfComments as $comment){
                                ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><a href="/post/<?= $comment['postId'] ?>"><?= $comment['titlePost'] ?></a></td>
                                    <td><?= $comment['pseudo'] ?></td>
                                    <td><?= $comment['email'] ?></td>
                                    <td><?= $comment['comment'] ?></td>
                                    <td><?= $comment['publicationDate'] ?></td>
                                    <td><a class="btn btn-danger btn-circle"href="/removeComment/<?= $comment['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                                    <td><a class="btn btn-success btn-circle" href="/validComment/<?= $comment['id'] ?>"><i class="fas fa-check"></i></a></td>
                                </tr>
                            <?php
                            $i++;
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="8" class="table-active"><?= $elements['infoRecuperation'] ?></td>
                                </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>

        </div>
    </div>


<?php
$content = ob_get_clean();
require('view/template/administrationTemplate.php');