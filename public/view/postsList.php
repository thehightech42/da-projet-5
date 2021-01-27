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
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <h6><a href="<?php echo '/post/'.$post['id'].''?>"><?= $post['title']?></a></h6>
                        <p><?= $post['short_description']?>
                        <p>Ecrit par <?= $post['pseudo'] ?>,<?php 
                            if($post['last_update'] !== NULL ){
                                echo ' mis à jour le '.$post['last_update'];
                            }else{
                                echo ' publié le '.$post['publication_date'];}
                            ?></p>
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