<?php

$titlePage = '404 - Page not found'; 
ob_start();
?>
    <div class="row justify-content-center align-itemps-center">
        <div class="col-lg-6">
            <h1>404 - Page Not found</h1>
        </div>
    </div>
<?php
$content = ob_get_clean();
require('template/templatePage.php');