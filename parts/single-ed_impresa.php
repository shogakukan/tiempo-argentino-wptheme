<?php
extract($args);
$issue = TA_Article_Factory::get_article($post);

$date = $issue->get_date_day('d/m/Y');

$thumbnail = $issue->get_thumbnail_common(null, 'medium');

$userdata = get_userdata(get_current_user_id());
$rol = $userdata->roles[0];
if ((is_user_logged_in() && get_user_meta(get_current_user_id(),'_user_status',true) == 'active' && $rol == get_option('subscription_digital_role')) || $rol == 'administrator'){
    $link = esc_attr($issue->issue_pdf['url']);
    $label = __('Ver online', 'gen-base-theme');
} else {
    $link = esc_attr(get_permalink(get_option('subscriptions_loop_page')));
    $label = __('Asociate para verlo online', 'gen-base-theme');
}
?>
<div class="container-fluid container-lg p-0 ">
    <div class="articulo-simple text-right">
        <div class="container">
            <div class="text-left mx-auto">
                <div class="categories d-flex">
                    <a href="<?= get_post_type_archive_link('ta_ed_impresa') ?>"><h4 class="theme mr-2"><?php echo __('Edición impresa', 'gen-base-theme'); ?></h4></a>
                    <h4 class="subtheme"><?php echo esc_html($issue->title); ?></h4></a>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex col-12 flex-column flex-lg-row p-0 flex-lg-row-reverse">
        <div class="col-12 col-lg-4 p-0">
            <div class="position-sticky container" style="top:100px">
                <a class="ta-ed-impresa-link" target="_blank" href="<?php echo $link; ?>"><?= $label ?></a>
                <?php if( $thumbnail ): ?>
                <div class="img-container">                
                    <div class="img-wrapper" id="article-main-image">
                        <a class="ta-ed-impresa-link" target="_blank" href="<?php echo $link; ?>">
                            <img src="<?php echo esc_attr($thumbnail['url']); ?>" alt="<?php echo esc_attr($thumbnail['alt']); ?>" class="img-fluid w-100" />
                        </a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-12 col-lg-8 p-0">

            <!-- ED_IMPRESA BODY -->
            <div class="articulo-simple text-right">
                <div class="container">
                    <div class="text-left mx-auto">
                        <div class="article-body">
                            <?php echo $issue->content ; ?>
                        </div>
                        <?php get_template_part( 'parts/article', 'social_buttons', array( 'class' => 'text-right mt-3' ) ); ?>
                    </div>
                </div>
                <div class="container-md mb-2 p-0">
                    <div class="separator"></div>
                </div>
            </div>
            <!-- END ED_IMPRESA BODY -->
        </div>

    </div>
</div>
