<?php

/**
 *   Page template
 */
?>
<?php get_header(); ?>
<?php if (is_active_sidebar('home_desk_sticky')) { ?>
<div class="home-side-layout-wrapper">
    <div class="home-side-layout-content">
<?php } ?>
<?php do_action('nota_apertura'); ?>
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
    <?php /*
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
    */ ?>
<?php endif; ?>

<?php TA_Blocks_Container_Manager::open_new(); ?>
<?php if (have_posts()) : the_post();

    if (is_front_page()) {
        do_action('quienes_somos_banner');
    }

    if (is_front_page()) {
        do_action('cloud_tag');
    } else {
        global $post;
        if($post->post_name == 'feriados'){
            do_action('feriados');
        }
    }

    the_content();
endif; ?>
<?php TA_Blocks_Container_Manager::close(); ?>

<?php if (is_active_sidebar('home_desk_sticky')) { ?>
</div>
<?php } ?>

<?php if (is_front_page()) { ?>
<?php if (is_active_sidebar('home_desk_sticky')) { ?>
    <div class="d-none home-sticky-sidebar">
        <div class="d-flex justify-content-center align-items-center">
        <?php dynamic_sidebar('home_desk_sticky') ?>
        </div>
    </div>
<?php } ?>
<?php } ?>

<?php if (is_active_sidebar('home_desk_sticky')) { ?>
</div>
<?php } ?>

<?php get_footer(); ?>