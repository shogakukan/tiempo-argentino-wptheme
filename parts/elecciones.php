<?php
if (is_front_page()) {
    if (!isset(get_option('elecciones_option_name')['enabled'])) {
        return;
    }
    if (!get_option('elecciones_option_name')['enabled']) {
        return;
    }
}
$defaultImg = "https://www.tiempoar.com.ar/wp-content/uploads/2021/09/silueta-e1631385327305.png";
$election = get_option('resultados_nacion');
$ganador = $election['resultados'][0];
$fotoGanador = $ganador["foto"] != "" ? get_bloginfo('template_directory') . '/parts/elecciones_data/' . $ganador["foto"] : $defaultImg;
$colorGanador = $ganador["color"];
$perdedor = $election['resultados'][1];
$fotoPerdedor = $perdedor["foto"] != "" ? get_bloginfo('template_directory') . '/parts/elecciones_data/' . $perdedor["foto"] : $defaultImg;;
$colorPerdedor = $perdedor["color"];
?>
<div class="title-container">
    <h4 class="elecciones-title">
        <span class="region">Todo el país</span> -
        <strong class="cargo">Presidenciales</strong>
    </h4>
</div>
<div class="container py-3 argentina-2023" style="padding:0;">
    <div class="wp-block-columns mb-0 caras">
        <div class="wp-block-column cara-ganador" style="flex-basis:10%">
            <div></div>
        </div>
        <div class="wp-block-column barra">
            <div class="wp-block-columns mb-0 h-100">
                <div class="wp-block-column col-ganador" style="flex-basis:<?= $ganador['votosPorc'] != '-' ? str_replace(',', '.', $ganador['votosPorc']) : 50 ?>%;">
                    <p class="mb-0"><?= $ganador['candidate'] ?></p>
                    <h3 class="mb-0"><?= $ganador['votosPorc'] ?>%</h3>
                    <span><?= $ganador['votos'] ?> votos</span>
                </div>
                <div class="wp-block-column col-perdedor">
                    <p class="mb-0"><?= $perdedor['candidate'] ?></p>
                    <h3 class="mb-0"><?= $perdedor['votosPorc'] ?>%</h3>
                    <span><?= $perdedor['votos'] ?> votos</span>
                </div>
            </div>
            <!--div class="wp-block-columns mb-0 h-100" style="width: 5px;border:2px solid;position: relative;top: -100%;margin: 0 auto !important;"></div-->
        </div>
        <div class="wp-block-column cara-perdedor" style="flex-basis:10%">
            <div></div>
        </div>
    </div>
    <div class="wp-block-columns mb-0 datos">
        <div class="wp-block-column ganador" style="flex-basis:10%;text-align:center">
            <p><?= $ganador['candidate'] ?></p>
            <h3 class="mb-0"><?= $ganador['votosPorc'] ?>%</h3>
            <span><?= $ganador['votos'] ?> votos</span>
        </div>
        <div class="wp-block-column centro">
            <p>Mesas escrutadas: <?= $election["mesasTotalizadasPorcentaje"] ?>% | Participación: <?= $election["participacionPorcentaje"] ?>% | Votos no positivos: <?= $election["valoresTotalizadosOtros"] ?>%</p>
            <p><?= $election["fuente"] ?></p>
            <button onClick="window.location.reload();">Actualizar</button>
        </div>
        <div class="wp-block-column perdedor" style="flex-basis:10%;text-align:center">
            <p><?= $perdedor['candidate'] ?></p>
            <h3 class="mb-0"><?= $perdedor['votosPorc'] ?>%</h3>
            <span><?= $perdedor['votos'] ?> votos</span>
        </div>
    </div>
    <div class="wp-block-column centro-mob pt-4">
        <p>Mesas escrutadas: <?= $election["mesasTotalizadasPorcentaje"] ?>% | Participación: <?= $election["participacionPorcentaje"] ?>% | Votos no positivos: <?= $election["valoresTotalizadosOtros"] ?>%</p>
        <p><?= $election["fuente"] ?></p>
        <button onClick="window.location.reload();">Actualizar</button>
    </div>
</div>
<style>
    @media(min-width: 768px) {
        .cara-ganador {
            position: relative;
            left: 20px;
        }

        .cara-perdedor {
            position: relative;
            right: 20px;
        }

        .datos .ganador,
        .datos .perdedor,
        .centro-mob {
            display: none;
        }
    }

    @media(max-width: 767px) {

        .caras,
        .datos {
            flex-wrap: nowrap !important;
            column-gap: 1.5rem;
        }

        .barra,
        .datos .centro {
            display: none;
        }

        .datos {
            flex-direction: row;
        }
    }
    .barra * {
            color: #fff;
        }
    .cara-ganador div {
        background-image: url('<?= $fotoGanador ?>');
        padding-bottom: 100%;
        background-size: cover;
        border-radius: 50%;
        background-position: center;
        border: 5px solid <?= $colorGanador ?>;
    }

    .cara-perdedor div {
        background-image: url('<?= $fotoPerdedor ?>');
        padding-bottom: 100%;
        background-size: cover;
        border-radius: 50%;
        background-position: center;
        border: 5px solid <?= $colorPerdedor ?>;
    }

    .col-ganador {
        background: <?= $colorGanador ?>;
        margin: 1rem 0 1rem 0;
        display: flex;
        align-items: flex-start;
        flex-direction: column;
        justify-content: center;
    }

    .col-ganador * {
        margin-left: 25px;
    }

    .col-perdedor {
        background: <?= $colorPerdedor ?>;
        margin: 1rem 0 1rem 0;
        display: flex;
        align-items: flex-end;
        flex-direction: column;
        justify-content: center;
    }

    .col-perdedor * {
        margin-right: 25px;
    }

    .datos {
        justify-content: space-between;
        padding-left: 20px;
        padding-right: 20px;
    }

    .centro,
    .centro-mob {
        text-align: center;
        font-family: caladea;
    }

    .argentina-2023 h3,
    .argentina-2023 span {
        font-family: libre baskerville;
    }

    .barra p{
        font-family: red hat display;
        font-weight: 900;
    }
    .centro button {
        background: var(--ta-celeste);
        border: none;
        color: #fff !important;
        padding: 1px 6px !important;
        display: inline-block;
    }
    .elecciones-title {
        background: var(--ta-celeste) !important;
        color: #fff !important;
        font-family: red hat display;
        font-style: italic;
        width: fit-content;
        padding: 1px 10px;
        font-size: large;
    }
</style>