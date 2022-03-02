<?php

$thumb_cont_class = $desktop_horizontal ? 'col-5 col-md-6 pr-0 pl-0' : ($size != 'large' && $size != 'mega-large' ? 'col-5 col-md-12 pr-0 pl-0' : '');
$info_class = $desktop_horizontal ? 'col-7 col-md-6' : ($size != 'large' && $size != 'mega-large' ? 'col-7 col-md-12 pr-md-0 pl-md-0' : '');
$preview_class = $desktop_horizontal ? 'd-flex' : ($size != 'large' && $size != 'mega-large' ? 'd-flex d-md-block' : '');
$preview_class .= " $class";
$preview_class = esc_attr($preview_class);
?>
<div
    <?php
    ta_print_article_preview_attr($article, array(
        'class'                 => "mb-3 $preview_class",
        'use_balancer_icons'    => true
    ));
    ?>
>
    <?php if ($article->video) : ?>
        <div class="<?php echo esc_attr($thumb_cont_class); ?>">
            <div class="img-container video">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo esc_html($article->get_video()); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>        
        </div>
    <?php elseif( $thumbnail_url ): ?>
    <div class="<?php echo esc_attr($thumb_cont_class); ?>">
        <a data-url href="<?php echo esc_attr($url); ?>">
            <div class="img-container">
                <div class="img-wrapper d-flex align-items-end lazy" data-thumbnail style='background-image: url("<?php echo $thumbnail_url; ?>")' alt="<?php echo esc_attr($thumbnail['alt']); ?>">
                    <div class="icons-container">
                        <div class="article-icons d-flex flex-column mb-2">
                            <?php get_template_part( 'parts/article', 'balancer_icons', array( 'article' => $article ) ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <?php endif; ?>
    <div class="content <?php echo esc_attr($info_class); ?>">
        <?php if($article instanceof TA_Edicion_Impresa): ?>
        <?php endif; ?>
        <?php if($cintillo): ?>
        <div class="article-border"></div>
        <div class="category-title">
            <h4 data-headband><?php echo $cintillo; ?></h4>
        </div>
        <?php endif; ?>
        <div class="title">
            <a data-url href="<?php echo esc_attr($url); ?>">
                <p data-title><?php echo esc_html($title); ?></p>
            </a>
        </div>
        <?php if($authors): ?>
        <div class="article-info-container">
            <div class="author">
                <p>Por <?php get_template_part('parts/article','authors_links', array( 'authors' => $authors )); ?></p>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
