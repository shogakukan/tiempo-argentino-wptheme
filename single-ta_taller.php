<?php
/*
*  Single taller page template
*
*/
$taller = TA_Article_Factory::get_article($post, 'ta_taller');
?>
<?php get_header($header_slug); ?>

<?php get_template_part('parts/single', 'taller'); ?>

<?php get_footer(); ?>
