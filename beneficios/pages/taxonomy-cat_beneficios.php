<?php get_header() ?>
<?php do_action('beneficios_taxonomy_header');
$isSocio = false;
if (is_user_logged_in()){
    $status = get_user_meta(get_current_user_id(), '_user_status', true);
    $userdata = get_userdata(get_current_user_id());
    $rol = $userdata->roles[0];
    $isSocio = $status == 'active' && $rol == get_option('subscription_digital_role');
}
if ($isSocio){
    $term = get_term_by('slug', get_query_var('term'), 'cat_beneficios');
    get_template_part('beneficios/pages/parts/beneficios', 'content', array('term_slug' => $term->slug, 'term_id' => $term->term_id));
} else {
    get_template_part('beneficios/pages/parts/beneficios', 'landing');
}
do_action('beneficios_loop_footer');
get_footer();
?>