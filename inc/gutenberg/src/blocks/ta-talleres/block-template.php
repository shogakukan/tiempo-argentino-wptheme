<?php
$args = array(
    'post_type'  => 'ta_taller',
    'meta_query' => array(
        array(
            'key'   => 'ta_taller_vidriera',
            'value' => true,
        )
    )
);
$postslist = get_posts($args);
$talleres_count = count($postslist);
$colClass = $talleres_count < 3 ? 'col-lg' : ($talleres_count % 2 == 0 && $talleres_count % 3 != 0 ? 'col-lg-6' :'col-lg-4');
?>
<div class="row justify-content-around">
    <?php foreach ($postslist as $post) : ?>
        <?php $taller = TA_Article_Factory::get_article($post, 'ta_taller'); ?>
        <?php if ($taller) : ?>
            <div class="taller mb-3 col-12 <?= $colClass ?> ">
                <div class="taller-container p-2">
                    <?php if ($taller->thumbnail_common['url']) : ?>
                        <a href="<?php echo $taller->url ?>">
                            <img src="<?php echo esc_attr($taller->thumbnail_common['url']); ?>" alt="" class="img-fluid w-100 h-auto mb-3" />
                        </a>
                    <?php endif; ?>
                    <?php /*
                    <?php if($taller->excerpt): ?>
                        <h4 class="taller-tallerista"><?php echo esc_html($taller->excerpt); ?></h4>
                    <?php endif; ?>
                    <?php if($taller->title): ?>
                        <h2 class="taller-titulo"><?php echo esc_html($taller->title); ?></h2>
                    <?php endif; ?>
                    <?php if($taller->cintillo): ?>
                        <h4 class="taller-volanta"><?php echo esc_html($taller->excerpt); ?></h4>
                    <?php endif; ?>
                    <?php if($taller->opening_date): ?>
                    <p class="taller-fechas">Inicia <?php echo esc_html($taller->opening_date); ?></p>
                    <?php endif; ?>
                    <p class="taller-encuentros"></p>
                    <p class="taller-descripcion">
                    </p>
                    */ ?>
                    <div class="m-0">
                        <div class="p-0 mb-2">
                            <div class="wp-block-buttons btn-campus">
                                <div class="wp-block-button m-0 has-custom-width wp-block-button__width-100 btn-programa">
                                    <a class="wp-block-button__link no-border-radius" href="<?php echo $taller->url ?>">
                                        <?= __('Programa', 'gen-base-theme'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php if($taller->inscription_button): ?>
                        <div class="p-0">
                            <div class="wp-block-buttons btn-campus">
                                <div class="wp-block-button m-0 has-custom-width wp-block-button__width-100 btn-programa">
                                    <a class="wp-block-button__link no-border-radius" href="<?php echo $taller->inscription_button ?>">
                                    <?= __('Inscribirse', 'gen-base-theme'); ?>
                                    </a>
                                </div>
                            </div>
                        </div></div>
                        <?php else: ?>
                    </div>
                    <span class="w-100 text-center d-block" style="text-transform:uppercase;background-color:var(--ta-celeste);color:white;font-family: 'Red Hat Display', sans-serif;padding: 0.6rem !important;">
                        <?= __('Inscripción cerrada', 'gen-base-theme'); ?>
                    </span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<style>
    .taller-container {
        border: 1px solid var(--ta-celeste);
    }

    .btn-campus .wp-block-button__link {
        padding: 0.6rem;
    }

    @media(max-width:1200px) {
        .btn-programa {
            margin-bottom: 0.5em !important;
        }

        .taller-container .wp-block-column {
            flex-basis: 100% !important;
            margin-left: 0;
        }

        .taller-container .wp-block-columns {
            flex-wrap: wrap;
        }
    }
</style>