<?php

$titlePage = "Mon compte";

ob_start();

?>
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-6 text-center">
            <h2>Bienvenue sur votre espace !</h2>
        </div>
    </div>

    <div class="row justify-content-around  mt-3">
        <div class="col-lg-4">
            <h3>Modification des informations</h3>
            <form action="/updateUserInformation" method="POST">
                <label for="first_name">Prénom :
                    <input type="text" name="first_name" class="input" placeholder="Votre prénom" value="<?php 
                        if(isset($userInformation['first_name'])){
                            echo $userInformation['first_name'];
                        }
                        ?>">
                </label>
                <label for="last_name">Nom :
                    <input type="text" name="last_name" class="input" placeholder="Votre nom" value="<?php 
                        if(isset($userInformation['last_name'])){
                            echo $userInformation['last_name'];
                        }
                        ?>">
                </label>
                <label for="email">Email :
                    <input type="email" name="email" class="input" placeholder="Votre email" value="<?php 
                        if(isset($userInformation['email'])){
                            echo $userInformation['email'];
                        }
                        ?>"required>
                </label>
                <label for="pseudo">Pseudo :
                    <input type="text" name="pseudo" class="input" placeholder="Votre pseudo" value="<?php 
                        if(isset($userInformation['pseudo'])){
                            echo $userInformation['pseudo'];
                        }
                        ?>" required>
                </label>
                <input type="submit" name="submit" value="Enregistrer les modifications">
            </form>
            <p><?php if(isset($_SESSION['infoUserUpdate']) && $_SESSION['infoUserUpdate'] !== false ){echo $_SESSION['infoUserUpdate'];}; unset($_SESSION['infoUserUpdate'])?></p>
        </div>
        <div class="col-lg-4">
            <h3>Changement du mot de passe</h3>
            <form method="POST" action="/updatePassword" >
                <label for="lastPassword">Ancien mot de passe :
                    <input type="password" name="lastPassword" class="input" placeholder="Votre ancien mot de passe">
                </label>
                <label for="password1">Votre nouveau mot de passe :
                    <input type="password" name="password1" class="input" placeholder="Votre nouveau mot de passe">
                </label>
                <label for="password2">Confirmez votre nouveau mot de passe :
                    <input type="password" name="password2" class="input" placeholder="Confirmez votre nouveau mot de passe">
                </label>
                <input type="submit" name="submit" value="Changer votre mot de passe">
            </form>
                <?php if(isset($_SESSION['userPasswordInfo'])){echo $_SESSION['userPasswordInfo']; unset($_SESSION['userPasswordInfo']);}?>
        </div>
    </div>

<?php

$content = ob_get_clean();

require('template/templatePage.php');