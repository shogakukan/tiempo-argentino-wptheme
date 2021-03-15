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
    <?php include_once('../../partes/perfil/user-tabs.php');  ?>
    <?php include_once('../../partes/footer.php');  ?>

    <script>
    $("#editDeliveryInfo").click(function(event) {
        event.preventDefault();
        $(this).html('Guardar')
        $('.delivery-info .input-container').each(function(i, elem) {
            $(elem).addClass('editing')
            $(`#${elem.id} input`).removeAttr('disabled');
        })

        $("#finishEditingDeliveryInfo").css({
            display: "block"
        });
    });

    $("#editPersonalInfo").click(function(event) {
        event.preventDefault();
        $(this).html('Guardar');
        $('.personal-info .input-container').each(function(i, elem) {
            $(elem).addClass('editing')
            $(`#${elem.id} input`).removeAttr('disabled');
        })

        $("#finishEditingPersonalInfo").css({
            display: "block"
        });
    });
    </script>
</body>

</html>