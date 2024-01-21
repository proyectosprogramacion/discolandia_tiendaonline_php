<?php
require_once("../config.php");
?>

<?php
include(FRONT . DS . "header.php");
?>



<div class="container py-5">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading">Contacta con nosotros</h2>
        <br>
            <h4 class="text-center bg-dark text-light py-2">
                <!--<?php display_message() ?>-->
            </h6>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <form action="" name="sentMessage" id="contactForm" method="post">
            <!-- Si estuviéramos en un servidor online
                <?php send_message(); ?>-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Tu nombre *" id="name"
                                required data-validation-required-message="Por favor introduce tu nombre.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Tu email *" id="email"
                                required data-validation-required-message="Por favor introduce tu email.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder="Asunto *" id="subject"
                                required data-validation-required-message="Por favor introduce el asunto.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Mensaje *" id="message" required
                                data-validation-required-message="Por favor introduce el mensaje."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>                  
                    <div class="clearfix"></div>
                   
                    <div class="col-lg-12 text-center">
                    <br>
                        <div id="success"></div>
                        <button type="submit" name="submit" class="btn text-light bg-dark ">Enviar mensaje</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>


<?php
include(FRONT . DS . "footer.php");
?>