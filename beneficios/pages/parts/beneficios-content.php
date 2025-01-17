<?php
$defaults = array(
    'term_slug' => null,
    'term_id' => null
);
extract(array_merge($defaults, $args));
?>
<!-- banner -->
<div class="mt-3">
    <div class="container-with-header">
        <div class="container">
            <div class="section-title">
                <h4><?php echo __('Beneficios', 'gen-base-theme') ?></h4>
            </div>
        </div>
        <div class="container mt-2 px-0 px-md-3">
            <div class="banner-beneficios">
                <div class="container">
                    <div class="banner-header d-flex align-items-center pt-3">
                        <div class="beneficios-icon mr-2 mr-md-3">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/white-gift.svg" alt="">
                        </div>
                        <div class="title">
                            <h2><?php echo __('Beneficios para la Comunidad Tiempo', 'gen-base-theme') ?></h2>
                        </div>
                    </div>
                    <div class="subtitle mt-3 mt-md-1">
                        <p><?php echo __('¿Cómo hago para obtener beneficios?', 'gen-base-theme') ?></p>
                    </div>
                    <div class="beneficios-steps">
                        <div class="step d-flex align-items-start">
                            <div class="step-icon d-flex mr-2 mx-md-2">
                                <div class="mr-1"><?php echo __('1', 'gen-base-theme') ?></div>
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/vector-steps.svg" alt="">
                            </div>
                            <div class="content">
                                <p><span><?php echo __('Elegí hasta 3 beneficios.', 'gen-base-theme') ?> </span><?php echo __('El orden en que los elijas se tomará como el orden de prioridad.', 'gen-base-theme') ?>
                                </p>
                            </div>
                        </div>
                        <div class="step d-flex align-items-start">
                            <div class="step-icon d-flex mr-2 mx-md-2">
                                <div class="mr-1"><?php echo __('2', 'gen-base-theme') ?></div>
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/vector-steps.svg" alt="">
                            </div>
                            <div class="content">
                                <p><?php echo sprintf(__('Haremos un %s para distribuirlos.', 'gen-base-theme'), '<span>' . __('sorteo', 'gen-base-theme') . '</span>') ?></p>
                            </div>
                        </div>
                        <div class="step d-flex align-items-start">
                            <div class="step-icon d-flex mr-2 mx-md-2">
                                <div class="mr-1"><?php echo __('3', 'gen-base-theme') ?></div>
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/vector-steps.svg" alt="">
                            </div>
                            <div class="content">
                                <p><?php echo sprintf(__('Te enviaremos un %s si ganaste. Te sugerimos solicitar más de uno para no quedarte sin nada.', 'gen-base-theme'), '<span>' . __('email', 'gen-base-theme') . '</span>') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- banner -->

<!-- buscador -->

<div class="container mt-3">
    <div id="benefitsSearchBar" class="show mb-4" aria-labelledby="benefitsSearchBar" data-parent="#search-btn2">
        <form action="<?php echo site_url('/beneficios'); ?>" method="get" id="searchformbenefits">
            <div class="search-bar-container px-3 pt-3 pb-4">
                <div class="close d-flex d-lg-none justify-content-end">
                    <div>
                        <button class="btn btn-link d-flex" data-toggle="collapse" data-target="#benefitsSearchBar" aria-expanded="true" aria-controls="benefitsSearchBar">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/close.svg" class="img-fluid" alt="">
                        </button>
                    </div>
                </div>

                <div class="input-container d-flex justify-content-center mt-3">
                    <div class="search-icon mr-2">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/search-icon-blue.svg" class="img-fluid" alt="">
                    </div>

                    <div class="input-wrapper flex-fill">
                        <input type="text" name="s" placeholder="Busca por ubicación o palabra clave" value="<?php if (isset($_GET['s'])) echo $_GET['s'] ?>"/>
                    </div>
                    <div class="search d-none d-lg-flex justify-content-center ml-3">
                        <button type="submit"><?php echo __('BUSCAR', 'gen-base-theme') ?></button>
                    </div>

                    <div class="close d-none d-lg-flex justify-content-end align-items-center ml-3">
                        <div>
                            <button class="btn btn-link d-flex" data-toggle="collapse" data-target="#benefitsSearchBar" aria-expanded="true" aria-controls="benefitsSearchBar">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/close.svg" class="img-fluid" alt="">
                            </button>
                        </div>
                    </div>
                </div>

                <div class="search d-flex d-lg-none justify-content-center mt-4">
                    <button type="submit"><?php echo __('BUSCAR', 'gen-base-theme') ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- buscador --->
<!-- filtros -->

<div class="mt-3">
    <div class="container-with-header">
        <div class="container">
            <div class="section-title">
                <h4><?php echo __('FILTRAR POR:', 'gen-base-theme') ?></h4>
            </div>
        </div>
        <div class="container mt-2">
            <div class="container p-0">
                <div class="article-tags d-flex flex-wrap mt-4">
                    <div class="tag mx-1 <?php if ($term_slug === null) echo 'selected' ?> d-flex justify-content-center my-2">
                        <div class="content p-1">
                            <a href="<?php echo get_permalink(get_option('beneficios_loop_page')) ?>">
                                <p class="m-0"><?php echo __('Todos', 'gen-base-theme') ?></p>
                            </a>
                        </div>
                        <div class="triangle"></div>
                    </div>
                    <?php foreach (beneficios_front()->show_terms() as $t) : ?>
                        <div class="tag <?php echo $term_slug === $t->{'slug'} ? 'selected' : '' ?> mx-1 d-flex justify-content-center my-2">
                            <div class="content p-1">
                                <a href="<?php echo get_term_link($t->{'term_id'}) ?>">
                                    <p class="m-0"><?php echo $t->{'name'} ?></p>
                                </a>
                            </div>
                            <div class="triangle"></div>
                        </div>
                    <?php endforeach ?>

                    <div class="btns-container d-flex d-md-none align-items-center mt-4">
                        <button type="button" data-toggle="collapse" data-target="#seeAllTags" aria-expanded="false" aria-controls="seeAllTags" class="collapsed">ver más<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/right-arrow.png" alt="" class="img-fluid" /></button>
                    </div>
                </div>
                <div class="container-md mb-2 p-0 d-none">
                    <div class="separator"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- filtros -->

<!-- beneficios -->
<div class="mt-3">
    <div class="container">
        <div class="line-height-0">
            <div class="separator"></div>
        </div>
    </div>
    <div class="container-with-header py-3">
        <div class="container">
            <div class="section-title">
                <h4><?php echo __('RESULTADOS POR FILTRO Y/O BÚSQUEDA', 'gen-base-theme') ?></h4>
            </div>
        </div>
        <div class="sub-blocks py-3">
            <div class="container">
                <div class="ta-articles-block flex-wrap d-flex flex-column flex-lg-row overflow-hidden justify-content-lg-left" id="beneficios-loop">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $post_per_page = 12;
                    $args = [
                        'post_type' => 'beneficios',
                        'posts_per_page' => $post_per_page,
                        'paged' => $paged,
                        'meta_query' => [
                            'relation' => 'AND',
                            [
                                'key' => '_active',
                                'value' => '1',
                                'compare' => 'LIKE'
                            ],
                            [
                                'relation' => 'OR',
                                [
                                    'key' => '_finish',
                                    'value' => date('Y-m-d'),
                                    'compare' => '>=',
                                    'type' => 'DATE'
                                ],
                                [
                                    'key' => '_finish',
                                    'value' => '',
                                    'compare' => 'LIKE'
                                ]
                            ]
                        ]
                    ];
                    if ($term_id !== null) {
                        $args['tax_query'] = [
                            [
                                'taxonomy' => 'cat_beneficios',
                                'field' => 'id',
                                'terms' => $term_id
                            ]
                        ];
                    }
                    if (isset($_GET['s']) && $_GET['s']){
                        $args['s'] = $_GET['s'];
                    }
                    $beneficios = new WP_Query($args);
                    // var_dump($beneficios);
                    ?>
                    <?php if ($beneficios->have_posts()) : ?>
                        <?php while ($beneficios->have_posts()) : $beneficios->the_post(); ?>
                            <?php
                            $beneficio_status = beneficios_front()->get_beneficio_by_user(wp_get_current_user()->ID, get_the_ID());
                            $beneficio_btn = __('Solicitar', 'beneficios');
                            if ($beneficio_status && $beneficio_status !== true && $beneficio_status === 'taken') {
                                $beneficio_btn = __('Volver a solicitar', 'beneficios');
                            } elseif ($beneficio_status) {
                                $beneficio_btn = __('Solicitado', 'beneficios');
                            }
                            ?>
                            <div class="article-preview vertical-article benefits d-flex flex-column mb-3 col-12 col-md-4 px-0 px-md-2 <?php echo $beneficio_status ?>" data-term="<?php echo beneficios_front()->show_terms_slug_by_post(get_the_ID()) ?>">
                                <div class="container p-2">
                                    <div class="">
                                        <a href="#" data-content="#content<?php echo get_the_ID() ?>" class="abrir-beneficio">
                                            <div class="img-container position-relative">
                                                <div class="img-wrapper" style="background:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium') ?>')center no-repeat;"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="content mt-2">
                                        <div class="title">
                                            <a href="#" data-content="#content<?php echo get_the_ID() ?>" class="abrir-beneficio">
                                                <p><?php echo get_the_title(get_the_ID()) ?></p>

                                                <?php if (get_post_meta(get_the_ID(), '_beneficio_discount', true) !== null || get_post_meta(get_the_ID(), '_beneficio_discount', true) !== '') : ?>
                                                    <p class="discount"><?php echo get_post_meta(get_the_ID(), '_beneficio_discount', true) ?></p>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="options mt-4">
                                            <!-- fecha -->
                                            <?php if (!$beneficio_status) : ?>
                                                <?php if (get_post_meta(get_the_ID(), '_beneficio_date', true)) : ?>
                                                    <div id="fechas">
                                                        <?php foreach (get_post_meta(get_the_ID(), '_beneficio_date', true) as $key => $val) : ?>
                                                            <label><input type="radio" data-button="#solicitar-<?php echo get_the_ID() ?>" <?php //echo $check 
                                                                                                                                            ?> class="select-dates" name="gender" value="<?php echo date('Y-m-d H:i:s', strtotime($val)); ?>"> <?php echo date_i18n('d M H:i',  strtotime($val)); ?>hs</label><br />
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php elseif ($beneficio_status === 'requested') : ?>
                                                <?php $requested_date = beneficios_front()->get_beneficio_data(wp_get_current_user()->ID, get_the_ID())->{'date_hour'}; ?>
                                                <?php if ($requested_date) : ?>
                                                    <p>Fecha elegida <?php echo $requested_date ?></p>
                                                <?php endif ?>
                                            <?php endif ?>
                                            <!-- fecha -->

                                            <div class="btns-container d-flex justify-content-between align-items-center">
                                                <div class="request">
                                                    <button type="button" <?php if (get_post_meta(get_the_ID(), '_beneficio_date', true)) {
                                                                                echo 'disabled';
                                                                            } ?> class="solicitar" data-id="<?php echo get_the_ID() ?>" data-user="<?php echo wp_get_current_user()->ID ?>" data-date="" id="solicitar-<?php echo get_the_ID() ?>">
                                                        <?php echo $beneficio_btn ?>
                                                    </button>
                                                </div>

                                                <div id="dni-<?php echo get_the_ID() ?>" class="dni-field" style="display: none;">
                                                    <?php echo __('Agrega tu DNI para solicitar el beneficio', 'beneficios') ?><br />
                                                    <p>
                                                        <input type="number" name="dni-number" id="dni-number-<?php echo get_the_ID() ?>" data-id="<?php echo get_the_ID() ?>" data-user="<?php echo wp_get_current_user()->ID ?>" data-date="" value="" class="form-control" />
                                                    </p>
                                                    <div class="request">
                                                        <button type="button" data-id="#dni-number-<?php echo get_the_ID() ?>" class="dni-button btn btn-primary">Solicitar</button>
                                                    </div>
                                                </div>


                                                <div class="see-description">
                                                    <button type="button" class="collapsed" data-content="#content<?php echo get_the_ID() ?>" data-toggle="collapse" data-target="#content<?php echo get_the_ID() ?>" aria-expanded="false" aria-controls="content<?php echo get_the_ID() ?>">
                                                        ver más <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/right-arrow.png" alt="" class="img-fluid" />
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="benefit-description collapse mt-4" id="content<?php echo get_the_ID() ?>">
                                            <div class="benefit-description-header d-flex align-items-end">
                                                <div class="benefit-icon mr-2">
                                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/tiempo-gift.svg" alt="">
                                                </div>
                                                <div>
                                                    <div class="title">
                                                        <p><?php echo __('Beneficios tiempo', 'gen-base-theme') ?></p>
                                                    </div>
                                                    <div class="category">
                                                        <p><?php echo beneficios_front()->show_terms_name_by_post(get_the_ID()) ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="description mt-3">
                                                <?php echo get_the_content(get_the_ID()) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <!-- <div class="col-12 pagination">
                            <button type="button" class="btn btn-block btn-text"><?php //next_posts_link(__('ver más', 'beneficios'), $beneficios->max_num_pages); 
                                                                                    ?></button>
                        </div> -->
                    <?php endif; ?>
                </div>
                <div class="col-12 pagination">
                    <?php if ($beneficios->max_num_pages > 1) : ?>
                        <button type="button" data-offset="<?php echo $post_per_page ?>" data-max="<?php echo $beneficios->max_num_pages ?>" data-term="<?php echo $term_id ?>" class="btn btn-block btn-text" id="cargar-loop"><?php _e('Ver más', 'beneficios') ?></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- beneficios -->