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
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/header.php");  ?>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/multimedia/fotografia-ppal.php");  ?>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/multimedia/audiovisual-ppal.php");  ?>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/multimedia/podcasts-ppal.php");  ?>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/multimedia/talleres-ppal.php");  ?>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/multimedia/talleres-grid.php");  ?>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/multimedia/podcasts-grid.php");  ?>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/footer.php");  ?>

    <script>
    $('audio').mediaelementplayer({
        features: ['playpause', 'progress', 'current', 'tracks', 'fullscreen']
    });
    </script>
</body>

</html>