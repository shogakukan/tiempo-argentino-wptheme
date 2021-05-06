<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tiempo Argentino</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&family=Merriweather:wght@900&family=Red+Hat+Display:wght@400;500;700;900&family=Caladea:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.16/mediaelement-and-player.min.js"
        integrity="sha512-MgxzaA7Bkq7g2ND/4XYgoxUbehuHr3Q/bTuGn4lJkCxfxHEkXzR1Bl0vyCoHhKlMlE2ZaFymsJrRFLiAxQOpPg=="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.16/mediaelementplayer.min.css"
        integrity="sha512-RZKnkU75qu9jzuyC+OJGffPEsJKQa7oNARCA6/8hYsHk2sd7Sj89tUCWZ+mV4uAaUbuzay7xFZhq7RkKFtP4Dw=="
        crossorigin="anonymous" />
    <script src="../../js/bootstrap.min.js"></script>
</head>

<body>
    <div class="ta-context portada">
        <?php include_once('../../partes/header.php');  ?>
        <div class="container p-0">
            <?php include_once('../../partes/banner-nuevo-tiempo.php');  ?>
            <?php include('../../partes/eleccion-contenidos.php');  ?>
            <?php include_once('../../partes/art-destacado-portada.php');  ?>
            <?php include_once('../../partes/misc.php');  ?>

            <?php include_once('../../partes/miscelanea-categoria.php');  ?>
            <?php include_once('../../partes/newsletter-personalizar.php');  ?>
            <?php include_once('../../partes/miscelanea-categoria2.php');  ?>
            <?php include_once('../../partes/fotogaleria.php');  ?>
            <?php include('../../partes/seamos-socios-fullwidth.php');  ?>
        </div>
        <?php include_once('../../partes/audiovisual-especial.php');  ?>
        <div class="container p-0">
            <?php include_once('../../partes/simple-x6.php');  ?>
        </div>
        <?php include_once('../../partes/opinion.php');  ?>
        <?php include_once('../../partes/podcasts.php');  ?>
        <div class="container p-0">
            <?php include_once('../../partes/fotogaleria2.php');  ?>
            <?php include_once('../../partes/tiempo-extra.php');  ?>
        </div>
        <?php include_once('../../partes/cultura.php');  ?>
        <?php include_once('../../partes/deportes.php');  ?>
        <?php include_once('../../partes/espectaculos.php');  ?>
        <div class="container p-0">
            <?php include_once('../../partes/historieta.php');  ?>
            <?php include('../../partes/contratapa.php');  ?>
            <?php include('../../partes/talleres.php');  ?>
            <?php include('../../partes/seamos-socios-fullwidth.php');  ?>
            <?php include_once('../../partes/footer.php');  ?>
        </div>
    </div>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/onboarding.php");  ?>


    <script>
    $('audio').mediaelementplayer({
        features: ['playpause', 'progress', 'current', 'tracks', 'fullscreen']
    });




    $(document).ready(function() {
        $("#asociate-popover").popover({
            container: ".asociate-popover .popover-container",
            placement: 'bottom',
            trigger: 'manual',
            template: '<div class="popover asociate" role="tooltip">' +
                '<div class="arrow">' +
                '</div>' +
                '<h3 class="popover-header">' +
                '</h3>' +
                '<div class="popover-body">' +
                '</div>' +
                '</div>',
            html: true,
            sanitize: false,
            title: function() {
                return '<div class="d-flex justify-content-between align-items-start">' +
                    '<p class="popover-title">Con tu aporte sostenés este Medio</p>' +
                    '<button type="button" id="close" class="close">' +
                    '<img src="/assets/images/close.svg" class="img-fluid">' +
                    '</button>' +
                    '</div>';
            },
            content: function() {
                return '<p>Hace una contribución o sumate como Socio/a</p>' +
                    '<div class="d-flex justify-content-between align-items-end">' +
                    '<span><img src="/assets/images/marker-tiempo.svg">paso 1 de 4</span>' +
                    '<button id="go-to-2">siguiente</button>' +
                    '</div>';
            }
        })
        $("#personaliza-popover").popover({
            container: ".personaliza-popover .popover-container",
            placement: 'bottom',
            trigger: 'manual',
            template: '<div class="popover personaliza" role="tooltip">' +
                '<div class="arrow"></div>' +
                '<h3 class="popover-header"></h3>' +
                '<div class="popover-body">' +
                '</div>' +
                '</div>',
            html: true,
            sanitize: false,
            title: function() {
                return '<div class="d-flex justify-content-between align-items-start"><p class="popover-title">Personalizá tu experiencia de lectura</p><button type="button" id="close" class="close"><img src="/assets/images/close.svg" class="img-fluid"></button></div>';
            },
            content: function() {
                return '<p>Completá solo 3 pasos</p><div class="d-flex justify-content-between align-items-end"><span><img src="/assets/images/marker-tiempo.svg">paso 2 de 4</span><button id="go-to-3">siguiente</button></div>';
            }
        })

        $("#iconos-popover").popover({
            container: ".popovers",
            placement: 'bottom',
            trigger: 'manual',
            template: '<div class="popover iconos" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
            html: true,
            sanitize: false,
            title: function() {
                return '<div class="d-flex justify-content-between align-items-start"><p class="popover-title">Tus preferencias se señalan en íconos:</p>' +
                    '<button type="button" id="close" class="close"><img src="/assets/images/close.svg" class="img-fluid"></button></div>';
            },
            content: function() {
                return '<ul><li><img src="/assets/images/icon-img-1.svg">Autor favorito</li><li><img src="/assets/images/icon-img-2.svg">Tema de interés</li><li><img src="/assets/images/icon-img-3.svg">Relevante por localización</li></ul>' +
                    '<div class="d-flex justify-content-between align-items-end"><span><img src="/assets/images/marker-tiempo.svg">paso 3 de 4</span>' +
                    '<button id="go-to-4">siguiente</button></div>';
            }
        })
        $("#config-popover").popover({
            container: ".config-popover .popover-container",
            placement: 'bottom',
            trigger: 'manual',
            template: '<div class="popover iconos" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
            html: true,
            sanitize: false,
            title: function() {
                return '<div class="d-flex justify-content-between align-items-start"><p class="popover-title">Tus configuraciones y actividad</p>' +
                    '<button type="button" id="close" class="close"><img src="/assets/images/close.svg" class="img-fluid"></button></div>';
            },
            content: function() {
                return '<p>Ingresa a tu panel de usuario y personalizá tu experiencia</p>' +
                    '<div class="d-flex justify-content-between align-items-end"><span><img src="/assets/images/marker-tiempo.svg">paso 4 de 4</span>' +
                    '<button id="end">entendido</button></div>';
            }
        })

        //First popover
        $(".asociate-popover").insertAfter($(".header-content"));
        $("<div class='asociate-opacity-bg'></div>").insertAfter($(".asociate-banner"));
        $(".asociate-banner").css("z-index", "200");
        $(document).on('click', '#go-to-2', goTo2);

        window.setTimeout(() => {
            $("#asociate-popover").popover('show')
        }, 500);

        function goTo2() {
            $('.asociate-opacity-bg').remove();
            $("<div class='personaliza-opacity-bg'></div>").insertAfter($(".personaliza-popover"));
            $(".asociate-banner").css("z-index", "auto");
            $("#personaliza-popover").popover('show')
            $('#asociate-popover').popover('hide');
            $('html, body').animate({
                scrollTop: $("#personaliza-popover").offset().top - 200
            }, 500);
        }

        //Second popover
        $(".personaliza-popover").insertAfter($(".eleccion-contenido"));
        $(".eleccion-contenido").css("z-index", "200");

        $(document).on('click', '#go-to-3', goTo3);

        function goTo3() {
            $(".eleccion-contenido").css("z-index", "auto");
            $('.personaliza-opacity-bg').remove();
            $("<div class='iconos-opacity-bg'></div>").insertAfter($(".iconos-popover").closest(
                ".articles-block"));
            $("#iconos-popover").popover('show')
            $('#personaliza-popover').popover('hide');
            $('html, body').animate({
                scrollTop: $("#iconos-popover").offset().top - 200
            }, 500);
        }


        //Third popover
        $(".iconos-popover").insertAfter($(".icons-container").first());
        $(".icons-container").first().add('.article-icons').css("z-index", "200");

        $(document).on('click', '#go-to-4', goTo4);

        function goTo4() {
            $(".hamburger-menu").css("z-index", "200");
            $(".icons-container").first().add('.article-icons').css("z-index", "auto");
            $('.iconos-opacity-bg').remove();
            $("<div class='config-opacity-bg'></div>").insertAfter($(".hamburger-menu"));
            $("#config-popover").popover('show')
            $('#iconos-popover').popover('hide');
        }

        //Fourth popover
        $(".config-popover").insertAfter($(".header-content"));


        $(document).on('click', '#end', endOnboarding);

        function endOnboarding() {
            $('.config-opacity-bg').remove();
            $('#config-popover').popover('hide');
        }


        $(document).on('click', '#close', cancelOnboarding);

        function cancelOnboarding() {
            $('.asociate-opacity-bg').remove();
            $('.personaliza-opacity-bg').remove();
            $('.iconos-opacity-bg').remove();
            $('.config-opacity-bg').remove();
            $('#asociate-popover').popover('hide');
            $('#personaliza-popover').popover('hide');
            $('#iconos-popover').popover('hide');
            $('#config-popover').popover('hide');
        }

    })
    </script>
</body>

</html>