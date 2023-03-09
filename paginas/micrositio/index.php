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
    <?php include_once('../../partes/micrositio/header-micrositio.php');  ?>
    <?php include('../../partes/micrositio/asociate-banner-micrositio.php');  ?>
    <?php include('../../partes/micrositio/slider-micrositio.php');  ?>
    <?php include('../../partes/micrositio/slider-micrositio.php');  ?>
    <?php include('../../partes/micrositio/slider-micrositio.php');  ?>
    <?php include_once('../../partes/footer.php');  ?>

    <script>
    const mobile = window.matchMedia("(max-width: 992px)")

    window.onscroll = function() {
        if (mobile.matches) {
            if (window.pageYOffset >= 90) {
                headerStickyMobile.classList.add("sticky")
                menuSticky.style.position = "sticky"
                menuSticky.style.transform = "none"
            } else {
                headerStickyMobile.classList.remove("sticky");
                menuSticky.style.position = "absolute"
                menuSticky.style.left = "0"
            }
        } else if (window.pageYOffset >= 200) {
            headerStickyDesktop.classList.add("sticky")
            menuSticky.style.position = "sticky"
            menuSticky.style.transform = "none"
            menuSticky.style.left = "0"
        } else {
            headerStickyDesktop.classList.remove("sticky");
            menuSticky.style.position = "absolute"
            menuSticky.style.transform = "translateX(-50%)"
            menuSticky.style.left = "50%"
        }
    };
    const menuSticky = document.getElementById("menu");
    const header = document.querySelector(".header-micrositio")
    const headerStickyMobile = document.getElementById("headerStickyMobile");
    const headerStickyDesktop = document.getElementById("headerStickyDesktop");
    </script>
</body>

</html>