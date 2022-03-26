<?php 

/* Template Name: Página tipo sección especial */
?>
<?php get_header();?>
<div class="py-3">
<div class="container">
    <div class="section-title">
        <h4><?= get_the_title() ?></h4>
    </div>
</div>
<div class="container-fluid container-lg mt-3">
    <?php the_content(); ?>
</div>
<?php get_footer(); ?>