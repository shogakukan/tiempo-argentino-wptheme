<?php
$article = TA_Article_Factory::get_article($post);
if(!$article)
    return;
$sponsor = $article->micrositio->get_sponsor();
?>
<div class="articulo-especial text-right my-4">
    <?php TA_Blocks_Container_Manager::open_new(); ?>
        <div class="text-left mx-auto">
            <div class="categories d-flex">
                <h4 class="theme mr-2"><?php echo esc_html($article->micrositio->title); ?></h4>
                <?php if($article->section): ?>
                <h4 class="subtheme"><?php echo $article->section->name; ?></h4>
                <?php endif; ?>
            </div>
            <div class="art-column-w-xpadding">
                <?php if($article->title): ?>
                <div class="title mt-2">
                    <h1><?php echo esc_html($article->title); ?></h1>
                </div>
                <?php endif; ?>
                <?php if($article->excerpt): ?>
                <div class="subtitle">
                    <h3><?php echo esc_html($article->excerpt); ?></h3>
                </div>
                <?php endif; ?>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <p class="date mb-0"><?php echo esc_html($article->get_date_day('d/m/Y')); ?></p>
                <?php get_template_part( 'parts/article', 'social_buttons', array( 'class' => 'text-right mt-3' ) ); ?>
            </div>
            <?php if ($article->video) : ?>
                <div class="img-container video mt-3">
                    <iframe id="article-video" width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo esc_html($article->get_video()); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php elseif( !$article->thumbnail_common['is_default'] ): ?>
                <div class="img-container mt-3">
                    <div class="img-wrapper" id="article-main-image">
                        <img src="<?php echo esc_attr($article->thumbnail_common['url']); ?>" alt="" class="img-fluid w-100" />
                    </div>
                    <?php get_template_part('parts/image', 'copyright', array('photographer' => $article->thumbnail_common['author'])); ?>
                    <?php if($article->thumbnail_common['caption']): ?>
                    <div class="bajada mt-3">
                        <p><?php echo esc_html($article->thumbnail_common['caption']); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php get_template_part('parts/article','authors_data', array( 'article' => $article )); ?>

            <div class="article-body mt-3">
                <div class="art-column-w-xpadding">
                    <?php if ($article->special_format == 'fotogaleria' && $article->gallery) : ?>
                        <div class="galeria-fotos">
                            <?php foreach ($article->gallery as $photo) : ?>
                                <div class="img-container mt-3">
                                    <div class="img-wrapper" id="article-main-image">
                                        <img src="<?php echo esc_attr($photo['url']); ?>" alt="" class="img-fluid w-100" loading="lazy"/>
                                    </div>
                                    <?php get_template_part('parts/image', 'copyright', array('photographer' => $photo['author'])); ?>
                                    <?php if($photo['caption']): ?>
                                    <div class="bajada mt-3">
                                        <p><?php echo esc_html($photo['caption']); ?></p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                    <?php endif; ?>
                    <?php echo apply_filters( 'the_content', $article->content ); ?>
                </div>
            </div>

            <?php get_template_part( 'parts/article', 'social_buttons', array( 'class' => 'text-right mt-3' ) ); ?>
        </div>
    <?php TA_Blocks_Container_Manager::close(); ?>
    <div class="container-md mb-2 p-0">
        <div class="separator"></div>
    </div>
</div>

<div class="container">
    <?php
    get_template_part('parts/article', 'tags', array(
        'tags'      => $article->tags,
        'class'    => 'mt-4',
    ));
    ?>
    <?php
    if($sponsor && $sponsor['logo'] && $sponsor['name']):
        $href = $sponsor['link'] ? 'href="' . esc_attr($sponsor['link']) . '"' : '';
    ?>
    <div class="sponsor">
        <div class="container-md mb-2 p-0">
            <div class="separator"></div>
        </div>
        <div class="sub-blocks mt-3 mt-md-0">
            <div class="container">
                <div class="ta-articles-block fullwidth-row">
                    <div class="article-preview col-12 p-0 d-flex mt-3 mt-md-0">
                        <div class="col-3 p-0">
                            <a target="_blank" <?php echo $href; ?>>
                                <div class="img-container position-relative">
                                    <div class="img-wrapper">
                                        <img src="<?php echo esc_attr($sponsor['logo']); ?>" alt="<?php echo esc_attr($sponsor['name']); ?>" class="img-fluid" />
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="content mt-0 col-9">
                            <div class="description">
                                <a target="_blank" <?php echo $href; ?>>
                                    <p><span class="ta-celeste-color"><?php echo esc_html($article->micrositio->name); ?> es una producción de Tiempo
                                            Argentino</span> realizada gracias
                                        a la
                                        cooperación de la <span><?php echo esc_html($sponsor['name']); ?></span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
        <div class="container">
            <?php if (is_active_sidebar('note_calltoaction_mob')) : ?>
            <div class="row d-flex d-block d-sm-none d-md-none d-lg-none mt-md-3 mb-md-3 mt-3">
                <div class="col-12 mx-auto">
                    <?php dynamic_sidebar('note_calltoaction_mob'); ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if (is_active_sidebar('note_calltoaction_desk')) : ?>
            <div class="row d-none d-sm-none d-md-flex d-lg-flex mt-md-3 mb-md-3 mt-3">
                <div class="col-12 mx-auto">
                    <?php dynamic_sidebar('note_calltoaction_desk'); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="container-md mb-2 p-0 d-none">
        <div class="separator"></div>
    </div>

    <?php //include_once(TA_THEME_PATH . "/markup/partes/newsletter-especial.php");  ?>
</div>
<?php include(TA_THEME_PATH . "/markup/partes/segun-tus-intereses.php");  ?>
<div class="container">
    <?php include_once(TA_THEME_PATH . "/markup/partes/comentarios.php");  ?>
    <?php // include_once(TA_THEME_PATH . "/markup/partes/pregunta-y-participa.php");  ?>
    <?php //include_once(TA_THEME_PATH . "/markup/partes/conversemos.php");  ?>
</div>

<?php //include(TA_THEME_PATH . "/markup/partes/mas-leidas-especial.php");  ?>
<?php get_template_part('parts/article', 'tambien_podes_leer', ['post_id' => get_the_ID()]); ?>
