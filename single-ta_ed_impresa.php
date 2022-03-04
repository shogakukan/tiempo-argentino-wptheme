<?php
/*
*  Single issue page template
*
*/
$edition = TA_Article_Factory::get_article($post);

?>

<?php get_header(); ?>

<?php get_template_part('parts/single', 'ed_impresa'); ?>

<?php get_footer(); ?>