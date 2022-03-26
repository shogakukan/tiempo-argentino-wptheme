<?php
$taller = TA_Article_Factory::get_article($post, 'ta_taller');
if(!$taller)
    return;
?>
<div class="articulo-especial text-right my-4">
    <?php TA_Blocks_Container_Manager::open_new(); ?>
        <div class="text-left mx-auto">
            <div class="categories d-flex">
                <a href="<?php echo "/formacion/"; ?>">
                    <h4 class="theme mr-2"><?php echo __('Formación','gen-base_theme'); ?></h4>
                </a>
                <?php if($taller->cintillo): ?>
                    <h4 class="subtheme"><?php echo $taller->cintillo; ?></h4></a>
                <?php endif; ?>
            </div>
            <div class="col-md-10 p-0 mx-auto">
                <?php if($taller->title): ?>
                <div class="title mt-2">
                    <h1><?php echo esc_html($taller->title); ?></h1>
                </div>
                <?php endif; ?>
                <div class="article-info-container">
                    <div class="author">
                    <?php $talleristasCount = is_countable($taller->teachers) ? count($taller->teachers) : 0 ; ?>
                    <?php if ($talleristasCount > 0) : ?>
                    <?php if ($talleristasCount == 1 && $taller->teachers[0]['name']) : ?>
                    <p><?= __('Tallerista', 'gen-base-theme'); ?> <?php echo esc_attr($taller->teachers[0]['name']) ?></p>
                    <?php elseif ($talleristasCount > 1) : ?>
                        <p>
                            <span><?= __('Talleristas', 'gen-base-theme'); ?> </span>
                            <?php foreach ($taller->teachers as $i => $teacher) : ?>
                            <?php if ($teacher && $teacher['name']) : ?>
                                <span><?php echo esc_attr($teacher['name']) ?></span>
                                <?php if ($i + 1 < $talleristasCount) echo " / " ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php endif; ?>

                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <p class="date mb-0"></p>
                <?php /*get_template_part( 'parts/article', 'social_buttons', array( 'class' => 'text-right mt-3' ) ); */?>
            </div>
            <?php /*if ($taller->video) : ?>
                <div class="img-container video mt-3">
                    <iframe id="article-video" width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo esc_html($taller->get_video()); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php elseif( !$taller->thumbnail_common['is_default'] ): ?>
                <div class="img-container mt-3">
                    <div class="img-wrapper" id="article-main-image">
                        <img src="<?php echo esc_attr($taller->thumbnail_common['url']); ?>" alt="" class="img-fluid w-100" />
                    </div>
                    <?php get_template_part('parts/image', 'copyright', array('photographer' => $taller->thumbnail_common['author'])); ?>
                    <?php if($taller->thumbnail_common['caption']): ?>
                    <div class="bajada mt-3">
                        <p><?php echo esc_html($taller->thumbnail_common['caption']); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endif; */?>

            <div class="article-body mt-3">
                <div class="col-md-8 p-0 mx-auto">
                    <?php if($taller->excerpt): ?>
                    <div class="subtitle">
                        <h3><?php echo esc_html($taller->excerpt); ?></h3>
                    </div>
                    <?php endif; ?>
                    <?php if ($taller->inscription_button) : ?> 
                    <div class="wp-block-buttons d-flex is-content-justification-center my-5">
                        <div class="wp-block-button btn-campus">
                            <a class="wp-block-button__link no-border-radius" href="<?php echo esc_attr($taller->inscription_button); ?>" target="_blank" rel="noreferrer noopener">
                                <?= __('INSCRIBIRSE', 'gen-base-theme'); ?>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php echo apply_filters( 'the_content', $taller->content ); ?>
                    <div class="separator mb-3"></div>
                    <div class="row">
                    <div class="col-12 col-lg-6">
                    <?php if ($taller->opening_date) : ?>
                        <p><strong><?= __('Fecha de inicio', 'gen-base-theme'); ?>:</strong> <?= $taller->opening_date ?></p>
                    <?php endif;?>
                    <?php if ($taller->encuentros) : ?>
                        <p><strong><?= __('Duración', 'gen-base-theme'); ?>:</strong> <?= $taller->encuentros ?></p>
                    <?php endif;?>
                    <p><strong><?= __('Acceso a Campus Virtual Milorillas', 'gen-base-theme'); ?></strong></p>
                    <p><?= __('Se entregan certificados.', 'gen-base-theme'); ?></p>
                    </div>
                    <div class="col-12 col-lg-6">
                    <div class="separator mb-3 d-block d-md-none"></div>
                    <?php if ($taller->price) : ?>
                        <?php if ($taller->price['general']) : ?>
                            <p><strong><?= __('Arancel General', 'gen-base-theme'); ?>:</strong> <?php echo esc_attr($taller->price['general']) ?></p>
                        <?php endif; ?>
                        <?php if ($taller->price['community']) : ?>
                            <p><strong><?= __('Arancel Comunidad Tiempo', 'gen-base-theme'); ?>:</strong> <?php echo esc_attr($taller->price['community']) ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                    <p><i><?= __('Por pagos internacionales, consultar a', 'gen-base-theme'); ?> <a href="mailto:<?= __('talleres@tiempoar.com.ar', 'gen-base-theme'); ?>"><?= __('talleres@tiempoar.com.ar', 'gen-base-theme'); ?></a></i></p>
                    </div></div>
                    <div class="separator mb-3"></div>
                    <?php foreach ($taller->teachers as $teacher) : ?>
                        <?php if ($teacher && $teacher['name'] && $teacher['bio']) : ?>
                        <div class="row">
                            <div class="col-12 h-100 <?= $teacher['photo'] ? 'pl-0 col-lg-7' : 'p-0'; ?>">
                                <p><strong><?= __('MINI BIO', 'gen-base-theme'); ?> | <strong><?php echo esc_attr($teacher['name']) ?></strong></strong></p>
                                <p><?php echo esc_attr($teacher['bio']) ?></p>
                            </div>
                            <?php if ($teacher['photo']) : ?>
                                <?php $teacherPhotoUrl = wp_get_attachment_image_url($teacher['photo'], 'destacado', false); ?>
                                <?php if ($teacherPhotoUrl) : ?>
                                <figure class="col-lg-5 col-12 pr-0">
                                    <div style="background-image: url(<?= $teacherPhotoUrl ?>);background-repeat: no-repeat;padding-bottom: 100%;background-position: center;border-radius: 50%;background-size: cover;"></div>
                                </figure>
                                <?php endif; ?>
                            <?php endif ?>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php TA_Blocks_Container_Manager::close(); ?>
    <div class="container-md mb-2 p-0">
        <div class="separator"></div>
    </div>
</div>

<?php
$args = array(
    'post_type'  => 'ta_taller',
    'exclude'    => array($post->ID),
    'numberposts'=> 3,
    'meta_query' => array(
        array(
            'key'   => 'ta_taller_vidriera',
            'value' => true,
        )
    )
);
$postslist = get_posts( $args );

$talleres_count = count($postslist);
$colClass = $talleres_count < 3 ? 'col' : 'col-lg-4 col-12';
?>
<div class="container-with-header ta-context light-blue py-3">
<div class="context-color">
<div class="container line-height-0">
<div class="separator m-0"></div>
</div>
<div class="context-bg  py-3">
<div class="container d-block d-lg-flex justify-content-between align-items-center">
<a class="section-title">
<h4><?= __('OTROS TALLERES', 'gen-base-theme'); ?></h4>
</a>
</div>
<div class="sub-blocks mt-3">
<div class="container">
<div class="container row justify-content-around m-auto">
    <?php foreach ($postslist as $post) : ?>
        <?php $taller = TA_Article_Factory::get_article($post, 'ta_taller'); ?>
        <?php if ($taller && $taller->thumbnail_common['url'] && $taller->url) : ?>
            <div class="taller <?= $colClass ?>">
                <div class="taller-container p-2">
                    <a href="<?php echo $taller->url ?>">
                        <img src="<?php echo esc_attr($taller->thumbnail_common['url']); ?>" alt="" class="img-fluid h-auto w-100" />
                    </a>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>


</div>
</div>
</div>
</div>
</div>


<style>
    .taller-container {
        border: 1px solid var(--ta-celeste);
    }
</style>