<?php
$article = TA_Article_Factory::get_article($post);
if(!$article)
    return;
?>
<div class="articulo-especial text-right my-4">
    <?php TA_Blocks_Container_Manager::open_new(); ?>
        <div class="text-left mx-auto">
            <div class="categories d-flex">
                <h4 class="theme mr-2">Tiempo Audiovisual</h4>
                <?php if($article->section): ?>
                    <a href="<?php echo esc_attr($article->section->archive_url); ?>"><h4 class="subtheme"><?php echo $article->section->name; ?></h4></a>
                <?php endif; ?>
            </div>
            <div class="col-md-10 p-0 mx-auto">
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
                <?php get_template_part('parts/article','authors_data', array( 'article' => $article, 'size' => 'mobile' )); ?>
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
                <?php get_template_part('parts/image', 'copyright', array('photographer' => $article->thumbnail_common['author'], 'caption' => $article->thumbnail_common['caption'])); ?>
                <?php if($article->thumbnail_common['caption']): ?>
                <div class="bajada mt-3">
                    <p><?php echo esc_html($article->thumbnail_common['caption']); ?></p>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php get_template_part('parts/article','authors_data', array( 'article' => $article, 'size' => 'desktop', 'special_format' => true)); ?>

            <div class="article-body mt-3">
                <div class="col-md-8 p-0 mx-auto">
                    <?php echo apply_filters( 'the_content', $article->content ); ?>
                    <?php get_template_part('parts/article','authors_subdata', array( 'article' => $article )); ?>
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
    <?php //include_once(TA_THEME_PATH . "/markup/partes/newsletter-especial.php");  ?>
</div>
<div class="container">
    <?php if (is_active_sidebar('article_mobile_calltoaction')) : ?>
    <div class="row d-flex d-block d-sm-none d-md-none d-lg-none mt-md-3 mb-md-3 mt-3">
        <div class="col-12 mx-auto">
            <?php dynamic_sidebar('article_mobile_calltoaction'); ?>
        </div>
    </div>
    <?php endif; ?>
    <?php if (is_active_sidebar('article_desktop_calltoaction')) : ?>
    <div class="row d-none d-sm-none d-md-flex d-lg-flex mt-md-3 mb-md-3 mt-3">
        <div class="col-12 mx-auto">
            <?php dynamic_sidebar('article_desktop_calltoaction'); ?>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php include(TA_THEME_PATH . "/markup/partes/segun-tus-intereses.php");  ?>
<div class="container">
    <?php include_once(TA_THEME_PATH . "/markup/partes/comentarios.php");  ?>
    <?php // include_once(TA_THEME_PATH . "/markup/partes/pregunta-y-participa.php");  ?>
    <?php //include_once(TA_THEME_PATH . "/markup/partes/conversemos.php");  ?>
</div>

<?php //include(TA_THEME_PATH . "/markup/partes/mas-leidas-especial.php");  ?>
<?php get_template_part('parts/article', 'tambien_podes_leer', ['post_id' => get_the_ID()]); ?>
