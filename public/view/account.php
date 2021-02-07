<?php
$titlePage = "Mon compte";
ob_start(); 
?>

<div class="row mt-5">
    <div class="col-lg-6">
        <div class="col-lg-10 offset-lg-1">
            <h3>Inscription :</h3>
        </div>
        <form method="POST" action="/user/insertUser" id="formUpdatePassword">
            <div class="col-lg-10 offset-lg-1 form-group">
                <label for="pseudo">Votre pseudo :</label>
                <input type="text" name="pseudo" class="input form-control" placeholder="Votre pseudo " value="<?php if(isset($elements['pseudo'])){echo $elements['pseudo']; }?>" required>
            </div>
            <div class="col-lg-10 offset-lg-1 form-group">
                <label for="email">Votre email :</label>
                <input type="email" name="email" class="input form-control" placeholder="Votre email" value="<?php if(isset($elements['email'])){echo $elements['email']; }?>" required>
            </div>
            <div class="col-lg-10 offset-lg-1 form-group">
                <label for="password1">Votre mot de passe :</label>
                <input type="password" name="password1" id="inputPassword1" class="input form-control" placeholder="Votre mot de passe">
            </div>
            <div class="col-lg-10 offset-lg-1 form-group">
                <label for="password2">Confirmez mot de passe :</label>
                <input type="password" name="password2" id="inputPassword2" class="input form-control" placeholder="Confirmez mot de passe">
            </div>
            <input type="hidden" name="token" value="<?= $this->_token ?>">
            <div class="col-lg-10 offset-lg-1 form-group">
                <input type="submit" class="btn btn-dark" name="submit" value="S'inscrire">
            </div>
        </form>
        <?php
            if(isset($elements['info']['registration'])){
                 ?>
                    <p> <?= $elements['info']['registration']; ?></p>
                 <?php
            }
        ?>
    </div>
    <div class="col-lg-6">
        <div class="col-lg-10 offset-lg-1">
            <h3>Connexion :</h3>
        </div>
        <form method="POST" action="/user/connection">
            <div class="col-lg-10 offset-lg-1 form-group">
                <label for="pseudo">Votre pseudo :</label>
                <input type="text" name="pseudo" class="input form-control" placeholder="Votre pseudo">
            </div>
            <div class="col-lg-10 offset-lg-1 form-group">
                <label for="password">Votre mot de passe :</label>
                <input type="password" name="password" class="input form-control" placeholder="Votre mot de passe">
            </div>
            <input type="hidden" name="token" value="<?= $this->_token ?>">
            <div class="col-lg-10 offset-lg-1">
                <input type="submit" class="btn btn-dark" name="submit" value="Connexion">
            </div>
        </form>
        <?php
        if(isset($elements['info']['connection'])){
                 ?>
                    <p> <?= $elements['info']['connection'] ?></p>
                 <?php
            }
        ?>
    </div>
</div>

<?php

$content = ob_get_clean();


ob_start();
    ?><script src="js/ControlePassword.js"></script>
        <script>let checkPassword = new ControlePassword(document.getElementById("formUpdatePassword"), document.getElementById("inputPassword1"), document.getElementById("inputPassword2"));</script><?php
$scriptPage = ob_get_clean();

require('template/templatePage.php');