<?php
if (is_front_page()){
    if (!isset(get_option('elecciones_option_name')['enabled'])){
        return;
    }
    if (!get_option('elecciones_option_name')['enabled']){
        return;
    }
}

$defaultImg = "https://www.tiempoar.com.ar/wp-content/uploads/2021/09/silueta-e1631385327305.png";

$data = array();
$data[] = get_option('resultados_nacion');
$data[] = get_option('resultados_pba');
$data[] = get_option('resultados_caba');
?>
<?php foreach ($data as $election) : ?>
    <div class="eleccion-container e-<?= $election["tagCode"] ?>">
        <div class="title-container">
            <h4 class="elecciones-title">
                <span class="region"><?= $election["region"] ?></span> -
                <strong class="cargo"><?= $election["eleccion"] ?></strong>
            </h4>
        </div>
        <div class="row elecciones-container">
            <?php foreach ($election["resultados"] as $key => $agrupacion) : ?>
                <div class="col-6 col-lg-2-4 candidate-container flex-column d-flex<?= ($key === key($election["resultados"])) ? ' last-candidate' : '' ?>">
                    <div class="row">
                        <div class="col-6 caritas">
                            <?php foreach ($agrupacion["listas"] as $i => $lista) : ?>
                                <img class="candidate" src="<?= $lista["foto"] != "" ? get_bloginfo('template_directory').'/parts/elecciones_data/' . $lista["foto"] : $defaultImg ?>" style="border-color:<?= $agrupacion["color"] != "" ? $agrupacion["color"] : "black" ?>;" />
                                <?php if ($i == 1) break; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-6 flex-column votos-container">
                            <?php if($agrupacion["votosPorc"] != '-') :?>
                                <strong><?= $agrupacion["votosPorc"] ?>%</strong>
                            <?php endif; ?>
                            <?php foreach ($agrupacion["listas"] as $lista) : ?>
                                <strong></strong>
                                <p class="cant-votos"><?= $lista["candidate"] != "" ? $lista["candidate"] : $lista["nom"] ?> <?= $lista["votosPorc"] ?>%</p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="alianza d-flex flex-column">
                        <div class="elecciones-separator"></div>
                        <p class="lista">
                            <strong class="lista"><?= $agrupacion["nombreCorto"] != "" ? $agrupacion["nombreCorto"] : $agrupacion["agrupacion"] ?></strong><br /><?= $agrupacion["votos"] ?> votos
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="votos-pie">
            <p>Mesas escrutadas: <?= $election["mesasTotalizadasPorcentaje"] ?>% | Participación: <?= $election["participacionPorcentaje"] ?>% | Votos no positivos: <?= $election["valoresTotalizadosOtros"] ?>%</p>
            <p><?= $election["fuente"] ?></p>
            <button onClick="window.location.reload();">Actualizar</button>
            <a class="button" href="/resultados">Resultados completos</a>
        </div>
    </div>
<?php endforeach;?>
<div class="article-tags elecciones-tags d-flex flex-wrap mt-4">
    <?php foreach ($data as $election) : ?>
        <div class="tag d-flex justify-content-center my-2">
            <div class="content p-1">
                <a class="btn-<?= $election["tagCode"] ?>" href="#">
                    <p class="m-0" data-tag="e-<?= $election["tagCode"] ?>"><?= $election["tagName"] ?></p>
                </a>
            </div>
            <div class="triangle"></div>
        </div>
    <?php endforeach;?>
</div>
<style>
    .wp-block-lazyblock-elecciones {
        margin-top: 10px;
    }

    .lista,
    .votos-pie {
        font-size: 0.85em;
        width: 100%;
        margin-bottom: 0;
        align-self: flex-end;
    }

    .votos-pie {
        text-align: center;
        margin-top: 10px;
    }
    @media (min-width: 992px){
        .col-lg-2-4 {
            flex: 0 0 20%;
            max-width: 20%;
        }
    }
    .candidate {
        border-radius: 50%;
        border: 3px solid;
        width: 100%;
    }

    img.candidate:nth-child(2) {
        position: absolute;
        width: 40%;
        right: 3px;
        bottom: 0;
    }
    .eleccion-container .caritas {
        height: fit-content;
    }
    .votos-container {
        /* align-self: center; */
        padding: 0;
        font-size: 1.5em;
    }

    .votos-container p,
    .porc-votos,
    .votos-pie p {
        margin-bottom: 0;
    }

    .votos-pie button,
    .votos-pie .button {
        background: var(--ta-celeste);
        border: none;
        color: #fff !important;
        padding: 1px 6px !important;
        display: inline-block;
    }
    .votos-pie .button:hover{
        text-decoration: none;
    }

    .votos-container p {
        font-size: 0.6em;
        font-family: libre baskerville;
    }

    .elecciones-container {
        justify-content: space-around;
        font-family: red hat display;
    }

    .candidate-container {
        /* border-bottom: 3px solid green;
    margin-bottom: 1em; */
        margin-right: -7.5px;
        margin-left: -7.5px;
        padding: 0;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .porc-votos {
        font-family: caladea;
        font-size: 1.8em;
        display: none;
    }

    .elecciones-title {
        font-family: red hat display;
        font-style: italic;
        width: fit-content;
        padding: 1px 10px;
        font-size: large;
    }

    .elecciones-title .provincia {
        font-weight: 400;
    }

    .selected,
    .selected+.triangle,
    .elecciones-title {
        background: var(--ta-celeste) !important;
    }

    .selected p,
    .elecciones-title {
        color: #fff !important;
    }

    .elecciones-separator {
        background-color: var(--ta-celeste);
        display: inline-block;
        height: 2px;
        margin-top: 25px;
        width: 60px;
    }

    .lista .lista {
        text-transform: uppercase;
        color: var(--ta-celeste);
        font-size: 1em;
    }

    .eleccion-container {
        display: none;
    }
    .home .candidate-container:nth-child(+n+6) {
            display: none !important;
    }
    @media (max-width: 991px) {
        .home .candidate-container:nth-child(+n+5) {
            display: none !important;
        }
    }

    @media (max-width: 599px) {

        .lista,
        .votos-pie {
            font-size: 0.85em;
        }

        .votos-container {
            font-size: 1.25em;
        }

        .votos-container p {
            font-size: 0.6em;
        }

        .candidate-container {
            padding: 0 15px;
        }

        .elecciones-title {
            font-size: medium;
        }

        .lista .lista {
            font-size: 0.9em;
        }
    }
</style>
<script>
    let links = document.querySelectorAll(".elecciones-tags a");
    let elections = document.querySelectorAll(".eleccion-container");
    links.forEach((l) => {
        l.addEventListener("click", function() {
            links.forEach((li) => {
                li.parentNode.classList.remove("selected");
            });
            elections.forEach(e => {
                e.style.display = "none";
            });
            l.parentNode.classList.add("selected");
            document.querySelector(`.${l.firstElementChild.dataset.tag}`).style.display = "block";
        });
    });

    document.querySelector(".btn-100").click();
</script>