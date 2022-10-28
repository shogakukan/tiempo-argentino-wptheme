<?php

/**
 *   Page template
 */
?>
<?php get_header(); ?>
<?php if (is_front_page()) :

    $articles = [];
    $articles[] = new TA_Balancer_Article(array(
        'postId'            => null,    //done
        'title'             => "Placeholder",      //done
        'url'               => "placeholder",      //done
        'headband'          => "placeholder",      //done
        'imgURL'            => "placeholder",      //done
        'isOpinion'         => false,   //done
        'section'           => null,    //done
        'authors'           => [],      //done
        'tags'              => [],      //done
        'themes'            => [],      //done
        'places'            => [],      //done
    ));
    ta_render_articles_block_row();

    // Usar placeholder de carga
?>

    <div class="fullpage-onboarding">
        <div class="container">
            <div class="popovers position-relative text-left">
                <div class="asociate-popover text-right">
                    <div class="popover-container position-relative">
                        <button id="asociate-popover" class="popover-dismiss" role="button" data-bs-toggle="popover" data-bs-trigger="manual">Dismissible
                            popover</button>
                    </div>
                </div>
                <div class="personaliza-popover text-right">
                    <div class="popover-container position-relative">
                        <button id="personaliza-popover" class="popover-dismiss" role="button" data-bs-toggle="popover" data-bs-trigger="manual">Dismissible
                            popover</button>
                    </div>
                </div>
                <div class="iconos-popover">
                    <div class="popover-container position-relative">
                        <button id="iconos-popover" class="popover-dismiss" role="button" data-bs-toggle="popover" data-bs-trigger="manual">Dismissible
                            popover</button>
                    </div>
                </div>
                <div class="config-popover text-left text-md-right">
                    <div class="popover-container position-relative">
                        <button id="config-popover" class="popover-dismiss" role="button" data-bs-toggle="popover" data-bs-trigger="manual">Dismissible
                            popover</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $elecciones_brasil_data = get_option('elecciones_brasil_option_name');
    $elecciones_brasil = (isset($elecciones_brasil_data['votos_lula']) &&
        isset($elecciones_brasil_data['votos_bolsonaro']) &&
        isset($elecciones_brasil_data['votos_nulos']) &&
        isset($elecciones_brasil_data['porc']) &&
        $elecciones_brasil_data['porc'] >= 0
    ) ? $elecciones_brasil_data : false;
    ?>
    <?php if ($elecciones_brasil) : ?>
        <?php
        $votos_totales_validos = $elecciones_brasil_data['votos_lula'] + $elecciones_brasil_data['votos_bolsonaro'];
        $votos_totales = $votos_totales_validos + $elecciones_brasil_data['votos_nulos'];
        $porc_lula = $votos_totales_validos > 0 ? $elecciones_brasil_data['votos_lula'] * 100 / $votos_totales_validos : 50;
        $porc_bolsonaro = $votos_totales_validos > 0 ? $elecciones_brasil_data['votos_bolsonaro'] * 100 / $votos_totales_validos : 50;
        $porc_nulos = $votos_totales > 0 ? $elecciones_brasil_data['votos_nulos'] * 100 / $votos_totales : 0;
        ?>
        <div class="container ">
            <div class="section-title">
                <h4>ELECCIONES BRASIL 2022</h4>
            </div>
        </div>
        <div class="container line-height-0">
            <div class="separator m-0"></div>
        </div>
        <div class="container py-3 brasil-2022" style="padding:0;">
            <div class="wp-block-columns mb-0 caras">
                <div class="wp-block-column cara-lula" style="flex-basis:10%">
                    <div></div>
                </div>
                <div class="wp-block-column barra">
                    <div class="wp-block-columns mb-0 h-100">
                        <div class="wp-block-column col-lula" style="flex-basis:<?= number_format($porc_lula, 0, ".") ?>%;">
                            <p class="mb-0">Lula</p>
                            <h3 class="mb-0"><?= number_format($porc_lula, 2, ",") ?>%</h3>
                            <span><?= number_format($elecciones_brasil_data['votos_lula'], 0, ",", ".") ?> votos</span>
                        </div>
                        <div class="wp-block-column col-bolsonaro">
                            <p class="mb-0">Bolsonaro</p>
                            <h3 class="mb-0"><?= number_format($porc_bolsonaro, 2, ",") ?>%</h3>
                            <span><?= number_format($elecciones_brasil_data['votos_bolsonaro'], 0, ",", ".") ?> votos</span>
                        </div>
                    </div>
                    <!--div class="wp-block-columns mb-0 h-100" style="width: 5px;border:2px solid;position: relative;top: -100%;margin: 0 auto !important;"></div-->
                </div>
                <div class="wp-block-column cara-bolsonaro" style="flex-basis:10%">
                    <div></div>
                </div>
            </div>
            <div class="wp-block-columns mb-0 datos">
                <div class="wp-block-column lula" style="flex-basis:10%;text-align:center">
                    <p>Lula</p>
                    <h3 class="mb-0"><?= number_format($porc_lula, 2, ",") ?>%</h3>
                    <span><?= number_format($elecciones_brasil_data['votos_lula'], 0, ",", ".") ?> votos</span>
                </div>
                <div class="wp-block-column centro">
                    Escrutado <?= $elecciones_brasil_data['porc'] ?>%<br />
                    <?= number_format($votos_totales, 0, ",", ".") ?> votos | 
                    <?= number_format($elecciones_brasil_data['votos_nulos'], 0, ",", ".") ?> blancos/nulos
                </div>
                <div class="wp-block-column bolsonaro" style="flex-basis:10%;text-align:center">
                    <p>Bolsonaro</p>
                    <h3 class="mb-0"><?= number_format($porc_bolsonaro, 2, ",") ?>%</h3>
                    <span><?= number_format($elecciones_brasil_data['votos_bolsonaro'], 0, ",", ".") ?> votos</span>
                </div>
            </div>
            <div class="wp-block-column centro-mob pt-4">
                    Escrutado <?= $elecciones_brasil_data['porc'] ?>%<br />
                    <?= number_format($votos_totales, 0, ",", ".") ?> votos<br />
                    (<?= number_format($elecciones_brasil_data['votos_nulos'], 0, ",", ".") ?> blancos/nulos)
            </div>
        </div>
        <style>
            @media(min-width: 768px){
                .cara-lula {
                position: relative;
                left: 20px;
            }
                .cara-bolsonaro {
                    position: relative;
                    right: 20px;
                }
                .datos .lula, .datos .bolsonaro, .centro-mob {display: none;}
            }

            @media(max-width: 767px){
                .caras, .datos {flex-wrap: nowrap !important;column-gap: 1.5rem;}
                .barra, .datos .centro{display: none;} 
                .datos{flex-direction: row;}
            }
            .cara-lula div {
                background-image: url('https://www.tiempoar.com.ar/wp-content/uploads/2022/10/lula-cara-e1667000645390.jpg');
                padding-bottom: 100%;
                background-size: cover;
                border-radius: 50%;
                background-position: center;
                border: 5px solid #e67a7a;
            }
            .cara-bolsonaro div {
                background-image: url('https://www.tiempoar.com.ar/wp-content/uploads/2022/10/bolsonaro-cara-e1667000501658.jpg');
                padding-bottom: 100%;
                background-size: cover;
                border-radius: 50%;
                background-position: center;
                border: 5px solid #f8d988;
            }
            .col-lula  {
                background: #e67a7a;
                margin: 1rem 0 1rem 0;
                display: flex;
                align-items: flex-start;
                flex-direction: column;
                justify-content: center;
            }
            .col-lula * {
                margin-left: 25px;
            }
            .col-bolsonaro  {
                background: #f8d988;
                margin: 1rem 0 1rem 0;
                display: flex;
                align-items: flex-end;
                flex-direction: column;
                justify-content: center;
            }
            .col-bolsonaro * {
                margin-right: 25px;
            }
            .datos {
                justify-content: space-between;
                padding-left: 20px;
                padding-right: 20px;
            }
            .centro, .centro-mob {
                text-align: center;
                font-family: caladea;
            }
            .brasil-2022 h3, .brasil-2022 span {font-family: libre baskerville;}
            .barra p, .datos p {font-family: red hat display;font-weight: 900;}
        </style>
    <?php endif; ?>

<?php endif; ?>

<?php TA_Blocks_Container_Manager::open_new(); ?>
<?php if (have_posts()) : the_post();

    if (is_front_page()) {
        do_action('quienes_somos_banner');
    }

    if (is_front_page()) {
        do_action('cloud_tag');
    }

    the_content();
endif; ?>
<?php TA_Blocks_Container_Manager::close(); ?>

<?php get_footer(); ?>