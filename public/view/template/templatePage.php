<?php
require('header.php'); 
require('nav.php');

if( $_SERVER['REQUEST_URI'] !== '/'){?>
<div id="content" class="other_home container-fluid">
    <?= $content; ?>
</div>
<?php
}else{
    ?>
    <div id="content">
        <?= $content; ?>
    </div>
    <?php
}

?>



<?php

require('footer.php');

if(isset($modal)){
    echo $modal;
}
