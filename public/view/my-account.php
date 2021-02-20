<?php

$titlePage = "Mon compte";

ob_start();

?>
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-6 text-center">
            <h2>Bienvenue sur votre espace !</h2>
        </div>
    </div>

    <div class="row justify-content-around  mt-5">
        <div class="col-lg-4">
            <h5>Modification des informations</h5>
            <form action="/user/updateUserInformation" method="POST">
                <div class="form-group">
                    <label for="first_name">Prénom :</label>
                    <input type="text" name="first_name" class="input form-control" placeholder="Votre prénom" value="<?php 
                        if(isset($elements['first_name'])){
                            echo $elements['first_name'];
                        }
                    ?>">
                </div>
                <div class="form-group">
                    <label for="last_name">Nom :</label>
                    <input type="text" name="last_name" class="input form-control" placeholder="Votre nom" value="<?php 
                        if(isset($elements['last_name'])){
                            echo $elements['last_name'];
                        }
                    ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" name="email" class="input form-control" placeholder="Votre email" value="<?php 
                        if(isset($elements['email'])){
                            echo $elements['email'];
                        }
                    ?>"required>
                </div>
                <div class="form-group">
                    <label for="pseudo">Pseudo :</label>
                    <input type="text" name="pseudo" class="input form-control" placeholder="Votre pseudo" value="<?php 
                        if(isset($elements['pseudo'])){
                            echo $elements['pseudo'];
                        }
                    ?>" required>
                </div>
                <input type="hidden" name="token" value="<?= $this->_token ?>">
                <input type="submit" class="btn btn-dark" name="submit" value="Enregistrer les modifications">
            </form>
            <p><?php if(isset($elements['info']['userGet']) ){echo $elements['info']['userGet'];}?></p>
            <p><?php if(isset($elements['info']['userChange']) ){echo $elements['info']['userChange'];}?></p>
        </div>
        <div class="col-lg-4">
            <h5>Changement du mot de passe</h5>
            <form id="formUpdatePassword" method="POST" action="/user/updatePassword" >
                <div class="form-group">
                    <label for="lastPassword">Ancien mot de passe :</label>
                    <input type="password" name="lastPassword" class="input form-control" placeholder="Votre ancien mot de passe">
                </div>
                <div class="form-group">
                    <label for="password1">Votre nouveau mot de passe :</label>
                    <input type="password" id="inputPassword1" name="password1" class="input form-control" placeholder="Votre nouveau mot de passe">
                </div>
                <div class="form-group">
                    <label for="password2">Confirmez votre nouveau mot de passe :</label>
                    <input type="password" id="inputPassword2"name="password2" class="input form-control" placeholder="Confirmez votre nouveau mot de passe">
                </div>
                <input type="hidden" name="token" value="<?= $this->_token ?>">
                <input type="submit" class="btn btn-dark" name="submit" value="Changer votre mot de passe">
            </form>
                <?php if(isset($elements['info']['password'])){echo $elements['info']['password'];}?>
        </div>
    </div>

<?php

$content = ob_get_clean();


ob_start();
    ?><script src="js/ControlePassword.js"></script>
        <script>let checkPassword = new ControlePassword(document.getElementById("formUpdatePassword"), document.getElementById("inputPassword1"), document.getElementById("inputPassword2"));</script><?php
$scriptPage = ob_get_clean();

require('template/templatePage.php');