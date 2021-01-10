<?php
$titlePage = "Antonin PFISTNER";
ob_start(); 
?>

<div class="row mt-5">
    <div class="col-lg-6">
        <div class="col-lg-10 offset-lg-1">
            <h3>Inscription :</h3>
        </div>
        <form method="POST" action="/addUser">
            <div class="col-lg-10 offset-lg-1">
                <label for="pseudo">Votre pseudo :
                    <input type="text" name="pseudo" class="input" placeholder="Votre pseudo" value="<?php if(isset($_SESSION['graspedUserInfo']['pseudo'])){echo $_SESSION['graspedUserInfo']['pseudo']; }?>" required>
                </label>
            </div>
            <div class="col-lg-10 offset-lg-1">
                <label for="email">Votre email :
                    <input type="email" name="email" class="input" placeholder="Votre email" value="<?php if(isset($_SESSION['graspedUserInfo']['email'])){echo $_SESSION['graspedUserInfo']['email']; }?>" required>
                </label>
            </div>
            <div class="col-lg-10 offset-lg-1">
                <label for="password1">Votre mot de passe :
                    <input type="password" name="password1" class="input" placeholder="Votre mot de passe">
                </label>
            </div>
            <div class="col-lg-10 offset-lg-1">
                <label for="password2">Confirmez mot de passe :
                    <input type="password" name="password2" class="input" placeholder="Confirmez mot de passe">
                </label>
            </div>
            <div class="col-lg-10 offset-lg-1">
                <input type="submit" name="submit" value="S'inscrire">
            </div>
        </form>
        <?php
            if(isset($_SESSION['addUserInfo'])){
                 ?>
                    <p> <?php echo $_SESSION['addUserInfo']; unset($_SESSION['addUserInfo']); ?></p>
                 <?php
            }elseif(isset($_SESSION['graspedUserInfo'])){
                unset($_SESSION['graspedUserInfo']);
            }
        ?>
    </div>
    <div class="col-lg-6">
        <div class="col-lg-10 offset-lg-1">
            <h3>Connexion :</h3>
        </div>
        <form method="POST" action="/logIn">
            <div class="col-lg-10 offset-lg-1">
                <label for="pseudo">Votre pseudo :
                    <input type="text" name="pseudo" class="input" placeholder="Votre pseudo">
                </label>
            </div>
            <div class="col-lg-10 offset-lg-1">
                <label for="password">Votre mot de passe :
                    <input type="password" name="password" class="input" placeholder="Votre mot de passe">
                </label>
            </div>
            <div class="col-lg-10 offset-lg-1">
                <input type="submit" name="submit" value="Connexion">
            </div>
        </form>
        <?php
        if(isset($userConnexionInfo)){
                 ?>
                    <p> <?= $userConnexionInfo ?></p>
                 <?php
            }
        ?>
    </div>
</div>

<?php

$content = ob_get_clean();

require('template/templatePage.php');