<?php
$titlePage = "Contact";

ob_start();
?>
    <section class="page-section" id="contactContainer">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contactez moi</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <form id="contactForm" method="POST" action="/sendMailContact">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" name="first&last_name" type="text" placeholder="Votre Nom et Prénom *" required="required" data-validation-required-message="Please enter your name."
                            value="<?php if(isset($elements["first&last_name"])){echo $elements["first&last_name"];}?>"/>
                            <!-- <p class="help-block text-danger"></p> -->
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="contact_email" type="email" placeholder="Votre Email *" required="required" data-validation-required-message="Please enter your email address." 
                            value="<?php if(isset($elements["email"])){echo $elements["email"];}?>"/>
                            <!-- <p class="help-block text-danger"></p> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <textarea class="form-control" name="content_message" placeholder="Votre Message *" required="required" data-validation-required-message="Please enter a message."
                            ><?php if(isset($elements["content_message"])){echo $elements["content_message"];}?></textarea>
                            <!-- <p class="help-block text-danger"></p> -->
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div id="success"></div>
                    <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Envoyer votre message</button>
                </div>
            </form>
            <div>
                <p><?php if(isset($elements["info"])){echo $elements["info"];};?></p>
            </div>
        </div>
    </section>
<?php
$content = ob_get_clean();

require('template/templatePage.php');