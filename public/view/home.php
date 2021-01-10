<?php
$titlePage = "Antonin PFISTNER";
ob_start(); 

if(isset($test)){
    echo $test;
}
?>

<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Bienvenie Dans Mon Monde</div>
        <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Contactez - Moi !</a>
    </div>
</header>

<?php

$content = ob_get_clean();

require('template/templatePage.php');
