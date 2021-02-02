<?php
$titlePage = "Projet";

ob_start();
?>
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Portfolio</h2>
            <h3 class="section-subheading text-muted">Retrouvez ci dessous l'ensemble de mes réalisations</h3>
        </div>
        <div>
            <h4 class="section-heading text-uppercase">Développeur D'Application Php/Symfony - Openclassrooms</h4>
            <h6 class="section-subheading text-muted">Formation Bac +3/4</h6>
        </div>
        <div class="row mb-5">
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#dap2">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/da/p2.png" alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Personaliser un thème Wordpress</div>
                        <div class="portfolio-caption-subheading text-muted">Wordpress</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#dap3">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/da/p3.png" alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Analyse d'un besoin client</div>
                        <div class="portfolio-caption-subheading text-muted">Cahier des charges et HTML - CSS</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <!-- <a class="portfolio-link" data-toggle="modal" href="#dap5"> -->
                        <!-- <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div> -->
                        <img class="img-fluid" src="img/da/p5.gif" alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Création d'un blog</div>
                        <div class="portfolio-caption-subheading text-muted">PHP</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div>
            <h4 class="section-heading text-uppercase">Développeur Web Junir - Openclassrooms</h4>
            <h6 class="section-subheading text-muted">Formation Bac +2</h6>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#dwjp1">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/dwj/p1.png" alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Intégration d'une maquette</div>
                        <div class="portfolio-caption-subheading text-muted">HTML - CSS</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#dwjp2">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/dwj/p2.png" alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Personaliser un thème Wordpress</div>
                        <div class="portfolio-caption-subheading text-muted">Wordpress</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#dwjp3">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/dwj/p3.png" alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Carte location vélo JS</div>
                        <div class="portfolio-caption-subheading text-muted">HTML - JS</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#dwjp4">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/dwj/p4.png" alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Blog pour un écrivain</div>
                        <div class="portfolio-caption-subheading text-muted">PHP</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#dwjp5">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/dwj/p5.png" alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Projet libre</div>
                        <div class="portfolio-caption-subheading text-muted">PHP</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();


ob_start();
?>
<!-- MODAL -->
    <!-- PARCOURS -->
        <!-- DA PHP SYMFONY -->

<!-- Model DA P2 -->
<div class="portfolio-modal modal fade" id="dap2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="img/icon/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Intégrez la maquette du site d'une agence web</h2>
                            <p class="item-intro text-muted">Réalisation en HTML et CSS pur d'une maquette</p>
                            <img class="img-fluid d-block mx-auto" src="img/da/p2.png" alt="" />
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Type: Wordpress</li>
                                <li>Projet scolare</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-1"></i>
                                Close Project
                            </button>
                            <a href="http://projet-2.antoninpfistner.fr" target="_blank">
                                <button class="btn btn-secondary" type="button">
                                    <i class="far fa-arrow-alt-circle-right"></i>
                                    Voir le projet
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Model DA P3 -->
<div class="portfolio-modal modal fade" id="dap3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="img/icon/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Cahier des charges et maquette</h2>
                            <p class="item-intro text-muted">Réalisation d'un cahier des charges pour une association et de maquette</p>
                            <img class="img-fluid d-block mx-auto" src="img/da/p3.png" alt="" />
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Type: Cahier des charges - HTML - CSS</li>
                                <li>Projet scolaire</li>
                            </ul>
                            <a href="doc/cahierdescharges.pdf" target="_blank">
                                <button class="btn btn-dark" type="button">
                                    <i class="fas fa-file"></i>
                                    Voir cahier des charges
                                </button>
                            </a>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-1"></i>
                                Close Project
                            </button>
                            <a href="http://projet-3.antoninpfistner.fr" target="_blank">
                                <button class="btn btn-secondary" type="button">
                                    <i class="far fa-arrow-alt-circle-right"></i>
                                    Voir le projet
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Model DA P5 -->
<div class="portfolio-modal modal fade" id="dap5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="img/icon/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Intégrez la maquette du site d'une agence web</h2>
                            <p class="item-intro text-muted">Réalisation en HTML et CSS pur d'une maquette</p>
                            <img class="img-fluid d-block mx-auto" src="img/da/p5.gif" alt="" />
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Type: One page</li>
                                <li>Projet scolaire</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-1"></i>
                                Close Project
                            </button>
                            <!-- <a href="http://projet-5.antoninpfistner.fr" target="_blank">
                                <button class="btn btn-secondary" type="button">
                                    <i class="far fa-arrow-alt-circle-right"></i>
                                    Voir le projet
                                </button>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL -->
    <!-- PARCOURS -->
        <!-- DWJ -->

<!-- Model DWJ P1 -->
<div class="portfolio-modal modal fade" id="dwjp1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="img/icon/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Intégrez la maquette du site d'une agence web</h2>
                            <p class="item-intro text-muted">Réalisation en HTML et CSS pur d'une maquette</p>
                            <img class="img-fluid d-block mx-auto" src="img/dwj/p1.png" alt="" />
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Type: One page</li>
                                <li>Projet scolaire</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-1"></i>
                                Close Project
                            </button>
                            <a href="http://p1.antoninpfistner.fr" target="_blank">
                                <button class="btn btn-secondary" type="button">
                                    <i class="far fa-arrow-alt-circle-right"></i>
                                    Voir le projet
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Model DWJ P2 -->
<div class="portfolio-modal modal fade" id="dwjp2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="img/icon/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Création d'un site wordpress</h2>
                            <p class="item-intro text-muted">Personalisation d'un thème wordpress pour le site d'un office de tourisme</p>
                            <img class="img-fluid d-block mx-auto" src="img/dwj/p2.png" alt="" />
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Type: Wordpress</li>
                                <li>Projet scolare</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-1"></i>
                                Close Project
                            </button>
                            <a href="http://p2.antoninpfistner.fr" target="_blank">
                                <button class="btn btn-secondary" type="button">
                                    <i class="far fa-arrow-alt-circle-right"></i>
                                    Voir le projet
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Model DWJ P3 -->
<div class="portfolio-modal modal fade" id="dwjp3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="img/icon/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Carte de location de vélo front-end</h2>
                            <p class="item-intro text-muted">Création d'une application front end de location de vélo.</p>
                            <img class="img-fluid d-block mx-auto" src="img/dwj/p3.png" alt="" />
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Type: JS</li>
                                <li>Projet scolaire</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-1"></i>
                                Close Project
                            </button>
                            <a href="http://p3.antoninpfistner.fr" target="_blank">
                                <button class="btn btn-secondary" type="button">
                                    <i class="far fa-arrow-alt-circle-right"></i>
                                    Voir le projet
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Model DWJ P4 -->
<div class="portfolio-modal modal fade" id="dwjp4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="img/icon/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Un blog pour un écrivain</h2>
                            <p class="item-intro text-muted">Création d'un blog pour pour un écrivain afin de publier chapitres par chapitres un livre.</p>
                            <img class="img-fluid d-block mx-auto" src="img/dwj/p4.png" alt="" />
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Type: PHP MVC</li>
                                <li>Projet scolaire</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-1"></i>
                                Close Project
                            </button>
                            <a href="http://p4.antoninpfistner.fr" target="_blank">
                                <button class="btn btn-secondary" type="button">
                                    <i class="far fa-arrow-alt-circle-right"></i>
                                    Voir le projet
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Model DWJ P5 -->
<div class="portfolio-modal modal fade" id="dwjp5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="img/icon/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Projet libre</h2>
                            <p class="item-intro text-muted">Création d'une blog ainsi que d'une api de crédit</p>
                            <img class="img-fluid d-block mx-auto" src="img/dwj/p5.png" alt="" />
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Type: PHP MVC</li>
                                <li>Projet scolaire</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-1"></i>
                                Close Project
                            </button>
                            <a href="http://p5.antoninpfistner.fr" target="_blank">
                                <button class="btn btn-secondary" type="button">
                                    <i class="far fa-arrow-alt-circle-right"></i>
                                    Voir le projet
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
$modal = ob_get_clean();

require('view/template/templatePage.php');
