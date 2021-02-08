<?php
$titlePage = "Admin Page";

ob_start();
?>

<div class="row justify-content-center">
        <div class="col-lg-10"><h5>Article</h5> </div>
        <div class="col-lg-10">
            <p>Voici le récapitulatif des articles publiés ou en attente de publication sur le site.</p>
        </div>

        <div class="col-lg-10">
            <?php
                if(isset($elements['infoModfication'])){
                    echo '<p>'.$elements['infoModfication'].'</p>';
                }
                ?>
                <table class="table table-dark over-scroll">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titre article</th>
                            <th scope="col">Pseudo</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date de publication</th>
                            <th scope="col">Editer</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody class="table-active">
                        <?php
                        $i = 1;
                        if($getPosts !== [] && !isset($elements['infoRecuperation'])){
                            foreach($posts as $post){
                                ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?php if($post['status'] === "Brouillon"){
                                        ?><a href="/updatePost/<?= $post['id'] ?>"><?= $post['title'] ?><?php
                                            }else{
                                            ?><a href="/post/<?= $post['id'] ?>"><?= $post['title'] ?></a><?php
                                        }?>
                                    </td>
                                    <td><?= $post['pseudo'] ?></td>
                                    <td><?= $post['status'] ?></td>
                                    <td><?= $post['publicationDate'] ?></td>
                                    <td><a href="/updatePost/<?= $post['id'] ?>"><i class="far fa-edit"></i></a></td>
                                    <td><form action="/deletePost/<?= $post['id'] ?>" method="POST"><input type="hidden" name="token" value="<?= $this->_token ?>"><button class="buttonAdminListPost"type="submit"><i class="far fa-trash-alt"></i></button></form></td>
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