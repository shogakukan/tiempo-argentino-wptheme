<?php
$beneficios_landing_page_id = get_option('beneficios_landing_page');
$content_post = get_post($beneficios_landing_page_id);
if ($content_post) {
    $content = $content_post->post_content;
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
?>
    <div class="landing-beneficios container">
        <?php echo $content; ?>
    </div>
<?php
} else {
    get_template_part('beneficios/pages/parts/beneficios', 'content');
}
?>