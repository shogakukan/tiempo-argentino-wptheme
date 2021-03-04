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
    <?php include_once('../../partes/informate/inicio.php');  ?>
    <?php include_once('../../partes/informate/tus-temas.php');  ?>
    <?php include_once('../../partes/informate/medios.php');  ?>
    <?php include_once('../../partes/informate/frecuencia.php');  ?>
    <?php include_once('../../partes/informate/finalizar.php');  ?>
    <?php include_once('../../partes/footer.php');  ?>

    <script>
    $(".articulo button").each(function(i, elem) {
        var chosenTopic = false
        $(elem).bind('click', function() {
            if (!chosenTopic) {
                $(elem).addClass('active')
            } else {
                $(elem).removeClass('active')
            }
            chosenTopic = !chosenTopic
            $(`#${elem.id} .topic-checkbox`).prop('checked', chosenTopic)
        })
    });

    $(".medio button").each(function(i, elem) {
        var chosenOpt = false
        $(elem).bind('click', function() {
            if (!chosenOpt) {
                $(elem).addClass('active')
            } else {
                $(elem).removeClass('active')
            }
            chosenOpt = !chosenOpt
        })
    });

    $('.next-btn').bind('click', function() {
        $('#aplicarPrefRecep').addClass('active')
    });
    $('.close-popup').bind('click', function() {
        $('#aplicarPrefRecep').removeClass('active')
    });
    $('.next-btn-2').bind('click', function() {
        $('#aplicarPrefFrec').addClass('active')
    });
    $('.close-popup').bind('click', function() {
        $('#aplicarPrefFrec').removeClass('active')
    });
    </script>
</body>

</html>