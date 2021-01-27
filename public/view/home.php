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
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="/contact">Contactez - Moi !</a>
    </div>
</header>


<!-- About-->
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">About</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <ul class="timeline">
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="" /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2013-2016</h4>
                        <h4 class="subheading">Baccalaureat</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="" /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2016 - 2017</h4>
                        <h4 class="subheading">Licence 1 Economie - Gestion</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                </div>
            </li>
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="" /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2018 - 2020</h4>
                        <h4 class="subheading">Développeur Web Junior - OpenClassrooms</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="" /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2020 - 2021</h4>
                        <h4 class="subheading">Développeur d'application PHP - Symfony</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image">
                    <h4>
                        Be Part
                        <br />
                        Of Our
                        <br />
                        Story!
                    </h4>
                </div>
            </li>
        </ul>
    </div>
</section>

<?php

$content = ob_get_clean();

require('template/templatePage.php');
