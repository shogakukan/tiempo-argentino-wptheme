<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tiempo Argentino</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&family=Merriweather:wght@900&family=Red+Hat+Display:wght@400;500;700;900&family=Caladea:wght@700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/header.php");  ?>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/sumate/sumate-opts.php");  ?>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/sumate/nuestro-compromiso.php");  ?>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/sumate/que-ofrecemos.php");  ?>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/sumate/sumate-formas.php");  ?>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/sumate/ejes.php");  ?>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/sumate/open-source.php");  ?>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/sumate/vision.php");  ?>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/sumate/sumate-opts-min.php");  ?>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/footer.php");  ?>

    <script src="/js/index.js"></script>
    <script>
    const mq = window.matchMedia('(min-width: 992px)');
    const dropdownList = document.getElementsByClassName("dropdown");

    window.addEventListener('resize', function() {
        if (mq.matches) {
            for (let item of dropdownList) {
                item.classList.add("show")
            }
        } else {
            for (let item of dropdownList) {
                item.classList.remove("show")
            }
        }
    });
    </script>
</body>

</html>