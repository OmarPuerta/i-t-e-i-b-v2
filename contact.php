<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->

<?php


use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {

    $nombre = $_POST['w3lName'];
    $email = $_POST['w3lSender'];
    $asunto = $_POST['w3lSubect'];
    $mensaje = $_POST['w3lMessage'];

    $errors = array();

    if(empty($nombre)){
        $errors[] = 'El campo nombre es obligatorio';
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = 'El correo electronico no es valido';
    }

    if(empty($asunto)){
        $errors[] = 'El campo asunto es obligatorio';
    }

    if(empty($mensaje)){
        $errors[] = 'El campo mensaje es obligatorio';
    }

    if(count($errors) == 0){

        $msj = "De: $nombre <a href='mailto:$email'>$email</a><br>";
        $msj .= "Asunto: $asunto<br><br>";
        $msj .= "Cuerpo del mensaje:";
        $msj .= '<p>' . $mensaje . '</p>';
        $msj .= "--<p>Este mensaje se ha enviado desde un formulario de contacto de Código de programación.</p>";

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'omarpuerta80@gmail.com';
            $mail->Password = 'OmarChiqui123';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('omarpuerta80@gmail.com', 'Emisor');
            $mail->addAddress('soledsoled1956@gmail.com', 'Receptor');
            // $mail->addReplyTo('opuerta@1cero1.com');

            $mail->isHTML(true);
            $mail->Subject = 'Formulario de contacto';
            $mail->Body = $msj;

            $mail->send();

            $respuesta = 'Correo enviado';
        } catch (Exception $e) {
            $respuesta = 'Mensaje ' . $mail->ErrorInfo;
        }
    }
}

?>



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacto - I T E I B</title>
    <!-- Google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
    <!-- header -->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index.html"><img style="width: 25%;" src="assets/images/banner2.png" alt=""></i>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.html">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="about.html">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="courses.html">Cursos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="contact.html">Contacto</a>
                        </li>
                    </ul>
                    <!-- search-right -->
                    <div class="header-search position-relative">
                        <div class="search-right mx-lg-2">
                            <a href="#search" class="btn search-btn p-0" title="search">
                                <i class="fas fa-search"></i></a>
                            <!-- search popup -->
                            <div id="search" class="pop-overlay">
                                <div class="popup">
                                    <form action="#search" method="GET" class="search-box">
                                        <input type="search" placeholder="Enter Keyword..." name="search"
                                            required="required" autofocus="">
                                        <button type="submit" class="btn"><span class="fas fa-search"
                                                aria-hidden="true"></span></button>
                                    </form>
                                </div>
                                <a class="close" href="#close">×</a>
                            </div>
                            <!-- //search popup -->
                        </div>
                    </div>
                    <!--//search-right-->
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <!-- //header -->
    
    <!-- inner banner -->
    <section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title pt-5">Contáctanos</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.html">Inicio</a></li>
                    <li class="active"><i class="fas fa-angle-right"></i>Contáctanos</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //inner banner -->

    <!-- contact block -->
    <section class="w3l-contact py-5" id="contact">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <p class="text-uppercase">PONERSE EN CONTACTO</p>
                <h3 class="title-style">Contáctanos</h3>
                <?php
                        if(isset($errors)) {
                            if (count($errors) > 0) {
                        ?>

                        
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <?php
                                    foreach ($errors as $error) {
                                        echo $error . '<br>';
                                    }
                                    ?>
                                </div>
                        
                        <?php
                            }
                        }
                        ?>
            </div>
            <div class="row contact-block">
                <div class="col-md-7 contact-right">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="signin-form">
                        <div class="input-grids">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="w3lName" id="w3lName" placeholder="Nombre"
                                        class="contact-input" required />
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" name="w3lSender" id="w3lSender" placeholder="Correo"
                                        class="contact-input" required />
                                </div>
                            </div>
                            <input type="text" name="w3lSubect" id="w3lSubect" placeholder="Asunto"
                                class="contact-input" required />
                                <!--
                            <input type="text" name="w3lWebsite" id="w3lWebsite" placeholder="Website URL"
                                class="contact-input" required="" />
                                -->
                        </div>
                        <div class="form-input">
                            <textarea name="w3lMessage" id="w3lMessage" placeholder="Mensaje.."
                               required  ></textarea>
                        </div>

                        <div class="text-start">
                            <button type="submit" name="submit" class="btn btn-style btn-style-3">Enviar Mensaje</button>
                        </div>
                    </form>
                </div>

                

                <div class="col-md-5 ps-lg-5 mt-md-0 mt-5">
                    <div class="contact-left">
                        <div class="cont-details">
                            <div class="d-flex contact-grid">
                                <div class="cont-left text-center me-3">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="cont-right">
                                    <h6>Dirección del Instituto</h6>
                                    <p>Manzana A casa 11 Urbanización Sabanales.</p>
                                </div>
                            </div>
                            <div class="d-flex contact-grid mt-4 pt-lg-2">
                                <div class="cont-left text-center me-3">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="cont-right">
                                    <h6>Llámanos</h6>
                                    <p><a class="call-style-w3" href="tel:+57 3014430052"> +57 3014430052</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a class="call-style-w3" href="tel:+57 3125594100"> +57 3125594100</a></p>
                                </div>
                            </div>
                            <div class="d-flex contact-grid mt-4 pt-lg-2">
                                <div class="cont-left text-center me-3">
                                    <i class="fas fa-envelope-open-text"></i>
                                </div>
                                <div class="cont-right">
                                    <h6>Nuestro Correo</h6>
                                    <p><a href="mailto:institutoiteib2022@gmail.com" class="mail">institutoiteib2022@gmail.com</a></p>
                                    
                                </div>
                            </div>
                            <div class="d-flex contact-grid mt-4 pt-lg-2">
                                <div class="cont-left text-center me-3">
                                    <i class="fas fa-headphones-alt"></i>
                                </div>
                                <div class="cont-right">
                                    <h6>Atención al Cliente</h6>
                                    <p><a href="mailto:conversationalclass2020@gmail.com" class="mail">conversationalclass2020@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (isset($respuesta)) { ?>
                    <div class="row py-3">
                        <div class="col-lg-6 col-md-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $respuesta; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- map -->
    <!--
    <div class="map">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2029670215184!2d-75.55758113523079!3d6.236956845485303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4428430cb2f9a9%3A0x1fab9f0c484cbd09!2sParque%20La%20Milagrosa!5e0!3m2!1ses!2sco!4v1675296634048!5m2!1ses!2sco" 
            width="100%" height="400" frameborder="0" style="border: 0px;" allowfullscreen="""></iframe>

        
    </div>
    -->
    <!-- //contact block -->

    <!-- footer block -->
    <footer class="w3l-footer-29-main">
        <div class="footer-29 pt-5 pb-4">
            <div class="container pt-md-4">
                <div class="row footer-top-29">
                    <div class="col-lg-4 col-md-6 footer-list-29">
                        <h6 class="footer-title-29">Datos de Contacto </h6>
                        <p class="mb-2 pe-xl-5">Dirección : Manzana A casa 11 Urbanización Sabanales.
                        </p>
                        <p class="mb-2">Número Telefónico : <a class="call-style-w3" href="tel:+57 3014430052"> +57 3014430052</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="call-style-w3" href="tel:+57 3125594100"> +57 3125594100</a></p>
                        <p class="mb-2">Correo Institucional : <a href="mailto:institutoiteib2022@gmail.com">institutoiteib2022@gmail.com</a></p>
                        <p class="mb-2">Correo Alterno : <a href="mailto:conversationalclass2020@gmail.com">conversationalclass2020@gmail.com</a></p>
                    </div>
                    <div class="col-lg-2 col-md-3 col-6 footer-list-29 mt-md-0 mt-4">
                        <ul>
                            <h6 class="footer-title-29">Enlaces Rápidos</h6>
                            <li><a href="about.html">Nosotros</a></li>
                            <li><a href="courses.html">Cursos</a></li>
                            <li><a href="#become-teacher">Vuélvete un Maestro</a></li>
                            <li><a href="contact.html">Contáctanos</a></li>
                            <li><a href="#career">Carreras</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-3 col-6 ps-lg-5 ps-lg-4 footer-list-29 mt-md-0 mt-4">
                        <ul>
                            <h6 class="footer-title-29">Explora</h6>
                            <li><a href="#blog">Publicaciones del Blog</a></li>
                            <li><a href="#privacy">Política de Privacidad</a></li>
                            <li><a href="contact.html">Contáctanos</a></li>
                            <li><a href="#license">Licencia y Uso</a></li>
                            <li><a href="#tutorials">Tutoriales</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8 footer-list-29 mt-lg-0 mt-4 ps-lg-5">
                        <h6 class="footer-title-29">Subscribete</h6>
                        <form action="#" class="subscribe d-flex" method="post">
                            <input type="email" name="email" placeholder="Dirección de Correo" required="">
                            <button class="button-style"><span class="fa fa-paper-plane"
                                    aria-hidden="true"></span></button>
                        </form>
                        <p class="mt-3">Suscríbase a nuestra lista de correo y reciba actualizaciones en su bandeja de entrada de correo electrónico.</p>
                    </div>
                </div>
                <!-- copyright -->
                <p class="copy-footer-29 text-center pt-lg-2 mt-5 pb-2">© 2023 I.T.E.I.B. All rights reserved. Design
                    by <a href="https://w3layouts.com/" target="_blank">W3Layouts</a></p>
                <!-- //copyright -->
            </div>
        </div>
    </footer>
    <!-- //footer block -->

    <!-- Js scripts -->
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fas fa-level-up-alt" aria-hidden="true"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- //move top -->

    <!-- common jquery plugin -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- //common jquery plugin -->

    <!-- theme switch js (light and dark)-->
    <script src="assets/js/theme-change.js"></script>
    <!-- //theme switch js (light and dark)-->

    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!-- bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- //bootstrap -->
    <!-- //Js scripts -->
</body>

</html>