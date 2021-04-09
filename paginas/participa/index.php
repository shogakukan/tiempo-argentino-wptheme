<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tiempo Argentino</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&family=Merriweather:wght@900&family=Red+Hat+Display:wght@400;500;700;900&family=Caladea:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/header.php");  ?>
    <div class="container ta-context participa mt-2 my-lg-5">
        <div class="context-bg amarillo">
            <div class="line-height-0">
                <div class="separator m-0"></div>
            </div>
            <div class="participa-block-container">
                <div class="section-title p-2">
                    <h4>PARTICIPÁ</h4>
                </div>
                <div class="container">
                    <div class="container-with-header">
                        <div class="py-2">
                            <div class="subs-opt mt-3 mt-md-5">
                                <div class="title text-center">
                                    <h4 class="italic">Desde Tiempo Argentino queremos generar comunidad:</h4>
                                </div>
                                <div class="subtitle">
                                    <p>Te ofrecemos la posibilidad de interactuar con tus referentes de opinión y con
                                        otrxs
                                        socixs y lectorxs de Tiempo. </p>
                                </div>
                                <div id="participaCarousel"
                                    class="participa-items carousel slide d-block d-md-none mt-4" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item item py-3 px-2 active">
                                            <div
                                                class="d-flex flex-column align-items-start justify-content-center h-100">
                                                <img class="d-block w-100" src="/assets/images/participa-1-amarillo.svg"
                                                    alt="First slide">
                                                <div class="caption mt-3 mx-auto">
                                                    <div class="title">
                                                        <h3>Participá con Tiempo</h3>
                                                    </div>
                                                    <div class="subtitle">
                                                        <p>Comentá en las últimas noticias y formá comunidad</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item item py-3 px-2">
                                            <div
                                                class="d-flex flex-column align-items-start justify-content-center h-100">
                                                <img class="d-block w-100" src="/assets/images/participa-2-amarillo.svg"
                                                    alt="Second slide">
                                                <div class="caption mt-3 mx-auto">
                                                    <div class="title">
                                                        <h3>Preguntá y participá</h3>
                                                    </div>
                                                    <div class="subtitle">
                                                        <p>Dejá tu consulta para que el autor de la nota responda</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item item py-3 px-2">
                                            <div
                                                class="d-flex flex-column align-items-start justify-content-center h-100">
                                                <img class="d-block w-100" src="/assets/images/participa-3-amarillo.svg"
                                                    alt="Third slide">
                                                <div class="caption mt-3 mx-auto">
                                                    <div class="title">
                                                        <h3>Participá de Vivos</h3>
                                                    </div>
                                                    <div class="subtitle">
                                                        <p>Comentá y debatí en vivos de tus temas de interés</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item item py-3 px-2">
                                            <div
                                                class="d-flex flex-column align-items-start justify-content-center h-100">
                                                <img class="d-block w-100" src="/assets/images/participa-4-amarillo.svg"
                                                    alt="Fourth slide">
                                                <div class="caption mt-3 mx-auto">
                                                    <div class="title">
                                                        <h3>Cerca de los autores</h3>
                                                    </div>
                                                    <div class="subtitle">
                                                        <p>Recibí notificaciones de sus respuestas e interacciones</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ol class="carousel-indicators">
                                        <li data-target="#participaCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#participaCarousel" data-slide-to="1"></li>
                                        <li data-target="#participaCarousel" data-slide-to="2"></li>
                                        <li data-target="#participaCarousel" data-slide-to="3"></li>
                                    </ol>
                                </div>
                                <div
                                    class="participa-items desktop d-none d-md-flex flex-column flex-md-row justify-content-md-between mt-md-5">
                                    <div class="item py-3 px-2 mx-3">
                                        <div class="d-flex flex-column align-items-start justify-content-center h-100">
                                            <img class="d-block w-100" src="/assets/images/participa-1-amarillo.svg"
                                                alt="First slide">
                                            <div class="caption mt-3">
                                                <div class="title">
                                                    <h3>Participá con Tiempo</h3>
                                                </div>
                                                <div class="subtitle">
                                                    <p>Comentá en las últimas noticias y formá comunidad</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item py-3 px-2 mx-3">
                                        <div class="d-flex flex-column align-items-start justify-content-center h-100">
                                            <img class="d-block w-100" src="/assets/images/participa-2-amarillo.svg"
                                                alt="Second slide">
                                            <div class="caption mt-3">
                                                <div class="title">
                                                    <h3>Preguntá y participá</h3>
                                                </div>
                                                <div class="subtitle">
                                                    <p>Dejá tu consulta para que el autor de la nota responda</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item py-3 px-2 mx-3">
                                        <div class="d-flex flex-column align-items-start justify-content-center h-100">
                                            <img class="d-block w-100" src="/assets/images/participa-3-amarillo.svg"
                                                alt="Third slide">
                                            <div class="caption mt-3">
                                                <div class="title">
                                                    <h3>Participá de Vivos</h3>
                                                </div>
                                                <div class="subtitle">
                                                    <p>Comentá y debatí en vivos de tus temas de interés</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item py-3 px-2 mx-3">
                                        <div class="d-flex flex-column align-items-start justify-content-center h-100">
                                            <img class="d-block w-100" src="/assets/images/participa-4-amarillo.svg"
                                                alt="Fourth slide">
                                            <div class="caption mt-3">
                                                <div class="title">
                                                    <h3>Cerca de los autores</h3>
                                                </div>
                                                <div class="subtitle">
                                                    <p>Recibí notificaciones de sus respuestas e interacciones</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btns-container text-center my-2 mt-md-5 mb-md-4">
                                    <button>Quiero ser parte</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/partes/footer.php");  ?>

    <script src="/js/index.js"></script>
</body>

</html>