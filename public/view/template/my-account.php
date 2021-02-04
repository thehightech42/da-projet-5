<?php

$titlePage = "Mon compte";

ob_start();

?>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h3>Bienvenue sur votre espace !</h3>
        </div>
    </div>

<?php



$content = ob_get_clean();