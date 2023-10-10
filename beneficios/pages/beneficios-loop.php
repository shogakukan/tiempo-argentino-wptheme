<?php get_header() ?>
<?php do_action('beneficios_loop_header');
$isSocio = false;
if (is_user_logged_in()){
    $status = get_user_meta(get_current_user_id(), '_user_status', true);
    $userdata = get_userdata(get_current_user_id());
    $rol = $userdata->roles[0];
    $isSocio = $status == 'active' && $rol == get_option('subscription_digital_role');
}
if ($isSocio){
    get_template_part('beneficios/pages/parts/beneficios', 'content');
} else {
    get_template_part('beneficios/pages/parts/beneficios', 'landing');
 }

get_footer();
?>