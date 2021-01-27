<?php
$titlePage = "Ecriture d'un article"; 

$linkStyle = "<link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/jodit/3.4.25/jodit.min.css\">";
ob_start();
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.4.25/jodit.min.js"></script>
<script>var wysiwyg = new Jodit('#wysiwyg', {height : 1000, theme:"dark"});</script>
<?php
$scriptPage = ob_get_clean();
ob_start();
?>
    <div class="row  mt-5 justify-content-center">
        <div class="col-lg-8">
            <h3>Ecriture d'un article</h3>
            <form action="/insertPost" method="post">

                <div class="form-group">
                    <label for="title">Titre de l'article :</label>
                    <input type="text" class="form-control" name="titlePost" id="titlePost" required value="<?php 
                    if(isset($_SESSION['titlePost'])){
                        echo $_SESSION['titlePost'];
                        unset($_SESSION['titlePost']);
                    }
                    ?>">
                </div>
                    
                <div class="form-group">
                    <label for="shortDescription">Description courte de l'article</label>
                    <input type="text" class="form-control" name="shortDescription" id="shortDescription" required value="<?php
                    if(isset($_SESSION['shortDescription'])){
                        echo $_SESSION['shortDescription'];
                        unset($_SESSION['shortDescription']);
                    }
                    ?>">
                    <p class="small">Très utile pour le référencement</p>
                </div>

                <div class="from-group">
                    <label for="content">Texte du l'article</label>
                    <textarea name="content" id="wysiwyg"><?php 
                    if(isset($_SESSION['content'])){
                        echo $_SESSION['content'];
                        unset($_SESSION['content']);
                    }
                    ?></textarea>
                </div>
                
                <div class="row mt-5 justify-content-between">
                    <div class="col-lg-3">
                        <input type="submit" name="plubish" class="btn btn-outline-success" value="Publier">
                    </div>

                    <div class="col-lg-3">
                        <input type="submit" name="draft" class="btn btn-outline-secondary" value="Sauvegarder en brouillon">
                    </div>
                </div>
                
            </form>
        
        
        </div>

    </div>



<?php
$content = ob_get_clean();

require('view/template/administrationTemplate.php');