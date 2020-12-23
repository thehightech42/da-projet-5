<?php

$titlePage = "Antonin PFISTNER";

ob_start(); 





$content = ob_get_clean();
require('template/templatePage.php');
