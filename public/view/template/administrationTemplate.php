<?php
require('header.php'); 
require('nav.php');
require('navAdmin.php')

?>
<div id="content" class=" <?php if( $_SERVER['REQUEST_URI'] !== '/'){echo "other_home";}?>">
    <div class="container-fluid">
        <div class="row h-100 rowNavHadmin">
            <div class="col-lg-2 pt-5" id="navAdmin">
                <?= $navAdmin ?>
            </div>

            <div class="col-lg-10 pt-5 mb-4">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <?= $content; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>


<?php

require('footer.php');
