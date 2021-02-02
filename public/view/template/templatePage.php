<?php
require('header.php'); 
require('nav.php');

?>

<div id="content" class="<?php if( $_SERVER['REQUEST_URI'] !== '/'){echo "other_home";}?>">
    <?= $content; ?>
</div>

<?php
    // echo $scriptPage;


require('footer.php');

if(isset($modal)){
    echo $modal;
}
