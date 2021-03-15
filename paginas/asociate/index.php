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
    <script src="../../js/bootstrap.min.js"></script>
</head>

<body>
    <?php include_once('../../partes/header.php');  ?>
    <?php include_once('../../partes/asociate/paquetes.php');  ?>
    <?php include_once('../../partes/asociate/otro-importe.php');  ?>
    <?php include_once('../../partes/asociate/paquete-elegido.php');  ?>
    <?php include_once('../../partes/asociate/domicilio-envio.php');  ?>
    <?php include_once('../../partes/asociate/no-identificado.php');  ?>
    <?php include_once('../../partes/asociate/sign-in-asociate.php');  ?>
    <?php include_once('../../partes/asociate/registrarse.php');  ?>
    <?php include_once('../../partes/asociate/metodo-pago.php');  ?>
    <?php include_once('../../partes/asociate/mercado-pago.php');  ?>
    <?php include_once('../../partes/asociate/transf-bancaria.php');  ?>
    <?php include_once('../../partes/asociate/finalizar.php');  ?>
    <?php include_once('../../partes/asociate/personalizar-localizacion.php');  ?>
    <?php include_once('../../partes/asociate/personalizar-temas.php');  ?>
    <?php include_once('../../partes/asociate/personalizar-periodismo.php');  ?>
    <?php include_once('../../partes/asociate/personalizar-emociones.php');  ?>
    <?php include_once('../../partes/asociate/personalizar-finalizar.php');  ?>
    <?php include_once('../../partes/footer.php');  ?>

    <script type="text/javascript">
    $(function() {
        $(".amount button").on('click', function(event) {
            $(".continue-btn").removeClass('active');
            $(".amount button").removeClass('active');
            const className = $(this).attr("class");
            $("#" + className).addClass('active');
            $(this).addClass('active');
        });
    });

    $('.continue-btn').bind('click', function() {
        $('#continuarErrorPopup').addClass('active')
    });
    $('.close-popup').bind('click', function() {
        $('#continuarErrorPopup').removeClass('active')
    });
    $('.login-btn').bind('click', function() {
        $('#warningDeliveryZones').addClass('active')
    });
    $('.close-popup').bind('click', function() {
        $('#warningDeliveryZones').removeClass('active')
    });
    $('#errorPagoBtn').bind('click', function() {
        $('#errorPago').addClass('active')
    });
    $('.close-popup').bind('click', function() {
        $('#errorPago').removeClass('active')
    });
    $('#pagoExitosoBtn').bind('click', function() {
        $('#pagoExitoso').addClass('active')
    });
    $('.close-popup').bind('click', function() {
        $('#pagoExitoso').removeClass('active')
    });

    $(".tema button").each(function(i, elem) {
        var chosenTopic = false
        $(elem).bind('click', function() {
            if (!chosenTopic) {
                $(elem).addClass('active')
            } else {
                $(elem).removeClass('active')
            }
            chosenTopic = !chosenTopic
        })
    });

    $(".articulo button").each(function(i, elem) {
        var chosenArticle = false
        $(elem).bind('click', function() {
            if (!chosenArticle) {
                $(elem).addClass('active')
            } else {
                $(elem).removeClass('active')
            }
            chosenArticle = !chosenArticle
        })
    });


    $(".foto button").each(function(i, elem) {
        var chosenPhoto = false
        $(elem).bind('click', function() {
            if (!chosenPhoto) {
                $(elem).addClass('active')
            } else {
                $(elem).removeClass('active')
            }
            chosenPhoto = !chosenPhoto
            $(`#${elem.id} .foto-checkbox`).prop('checked', chosenPhoto)
        })
    });
    </script>
</body>

</html>