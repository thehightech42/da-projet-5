<?php
$titlePage = "Mise à jour d'un article "; 

$linkStyle = "<link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/jodit/3.4.25/jodit.min.css\">";
ob_start();
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.4.25/jodit.min.js"></script>
<script>var wysiwyg = new Jodit('#wysiwyg', {height : 1000, theme : "dark"});</script>
<?php
$scriptPage = ob_get_clean();
ob_start();
?>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h3 class="mb-5">Mise à jours de l'article "<?= $elements['titlePost']?>"</h3>
            <form action="/insertUpdatePost" method="post">

                <div class="form-group mb-4">
                    <label for="title">Titre de l'article :</label>
                    <input type="text" class="form-control" name="titlePost" id="titlePost" required value="<?= $elements['titlePost']?>">
                </div>
                    
                <div class="form-group mb-4">
                    <label for="shortDescription">Description courte de l'article</label>
                    <input type="text" class="form-control" name="shortDescription" id="shortDescription" value="<?= $elements['shortDescription'] ?>">
                    <p class="small">Très utile pour le référencement</p>
                </div>

                <div class="from-group mb-4">
                    <label for="content">Texte du l'article</label>
                    <textarea name="content" id="wysiwyg"><?= $elements['content'] ?></textarea>
                </div>
                
                <div class="row mt-5 justify-content-between">
                    <div class="col-lg-3">
                        <input type="submit" name="plubish" class="btn btn-outline-success" value="Publier">
                    </div>

                    <div class="col-lg-3">
                        <input type="submit" name="draft" class="btn btn-outline-secondary" value="Sauvegarder en brouillon">
                    </div>
                </div>
                <input type="hidden" name="token" value="<?= $this->_token ?>">
                <input type="text" name="id_post" style="display:none;" readonly value="<?= $elements['id'] ?>">
                
            </form>
            <p><?php if(isset($elements['info'])){echo $elements['info'];}?></p>
        
        
        </div>

    </div>



<?php
$content = ob_get_clean();
require('view/template/administrationTemplate.php');
// require('view/template/templatePage.php');