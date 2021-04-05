<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tiempo Argentino</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&family=Merriweather:wght@900&family=Red+Hat+Display:wght@400;500;700;900&family=Caladea:wght@700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="../../js/bootstrap.min.js"></script>
</head>

<body>
    <?php include_once('../../partes/header.php');  ?>
    <?php include_once('../../partes/articulo-especial.php');  ?>
    <?php include_once('../../partes/seamos-socios-fullwidth.php');  ?>
    <?php include_once('../../partes/tags.php');  ?>
    <?php include_once('../../partes/sponsor.php');  ?>
    <div class="d-none d-md-block">
        <?php include_once('../../partes/audiovisual-especial.php');  ?>
    </div>
    <div class="d-block d-md-none">
        <?php include_once('../../partes/audiovisual.php');  ?>
    </div>
    <?php include_once('../../partes/newsletter-especial.php');  ?>
    <?php include('../../partes/segun-tus-intereses.php');  ?>
    <?php include('../../partes/talleres.php');  ?>
    <?php include_once('../../partes/comentarios.php');  ?>
    <?php include_once('../../partes/pregunta-y-participa.php');  ?>
    <?php include_once('../../partes/conversemos.php');  ?>
    <?php include_once('../../partes/relacionados-tema.php');  ?>
    <?php include('../../partes/mas-leidas-especial.php');  ?>
    <?php include('../../partes/ultimas-ambientales.php');  ?>
    <?php include_once('../../partes/podes-leer.php');  ?>
    <?php include_once('../../partes/footer.php');  ?>

    <script>
    const desktop = window.matchMedia("(min-width: 768px)");

    window.onscroll = function() {
        if (desktop.matches) {
            if (window.pageYOffset >= 140) {
                headerStickyDesktop.classList.add("sticky-default");
                menuSticky.style.position = 'sticky';
                menuSticky.style.left = '0';
                menuSticky.style.paddingTop = '20px';
                menuSticky.style.transform = 'none';
            } else {
                headerStickyDesktop.classList.remove("sticky-default");
                menuSticky.style.position = 'absolute';
                menuSticky.style.left = '50%';
                menuSticky.style.paddingTop = '60px';
                menuSticky.style.transform = 'translateX(-50%)';
            }
        } else {
            if (window.pageYOffset >= 65) {
                headerStickyDesktop.classList.remove("sticky-default");
                menuSticky.style.position = 'sticky';
                menuSticky.style.left = '50%';
                menuSticky.style.paddingTop = '0';
            } else {
                menuSticky.style.position = 'absolute';
                menuSticky.style.left = '0';
                menuSticky.style.paddingTop = '0';
            }
        }
    };

    const menuSticky = document.getElementById('menu');
    const headerStickyDesktop = document.getElementById("headerDefault");
    </script>
</body>

</html>