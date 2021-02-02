<?php

$titlePage = "Liste des articles"; 

ob_start(); 
?>

<div class="row justify-content-center">
    <div class="col-lg-8 mt-5">
        <h4>Articles</h4>
        <?php 
        if(isset($elements['info'])){
            echo '<h6>'.$elements['info'].'</h6>';
        }else{
            foreach($posts as $post){
                ?>
                <div class="card mt-3 mb-3">
                    <div class="card-header">
                        <h6><a href="<?php echo '/post/'.$post['id'].''?>"><?= $post['title']?></a></h6>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                        <p><?= $post['short_description']?></p>
                        <footer class="blockquote-footer">Ecrit par <cite title="Source Title"><?= $post['pseudo']?></cite></footer>
                        </blockquote>
                    </div>
                    <div class="card-footer text-muted">
                        <?php 
                            if($post['last_update'] !== NULL ){
                                $objDate = new DateTime($post['last_update']);
                                echo ' Mis à jour le '.$objDate->format('d F Y');
                            }else{
                                $objDate = new DateTime($post['publication_date']);
                                echo ' Publié le '.$objDate->format('d F Y');}
                        ?>
                    </div>
                </div>
                                   
                <?php
            }
        }
            
        ?>
    </div>
</div>

<?php

$content = ob_get_clean();

require('template/templatePage.php');