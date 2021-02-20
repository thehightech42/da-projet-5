<?php

$titlePage = "Dashboard";

ob_start();
?>
<div class="container">
    
</div>
<div class="row justify-content-around mb-3">
    <div class="col-lg-12 mb-2"><h5>Information sur les articles :</h5></div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-m font-weight-bold text-primary text-uppercase mb-1">
                            Tous</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countPost[0] ?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-2x fa-check-double text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-m font-weight-bold text-primary text-uppercase mb-1">
                            Publié</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countPublishedPost[0] ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-2x fa-check text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-m font-weight-bold text-primary text-uppercase mb-1">
                            Brouillon</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countDaftPost[0] ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-2x fa-pencil-ruler text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-around">
    <div class="col-lg-12 mb-2"><h5>Information sur les commentaires :</h5></div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-m font-weight-bold text-primary text-uppercase mb-1">
                            Tous</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countComment[0] ?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-2x fa-comment text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-m font-weight-bold text-primary text-uppercase mb-1">
                            Validé</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countCommentValidated[0] ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-2x fa-check text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-m font-weight-bold text-primary text-uppercase mb-1">
                            En attente</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countCommentWaiting[0] ?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-2x fa-hourglass text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

require('view/template/administrationTemplate.php');