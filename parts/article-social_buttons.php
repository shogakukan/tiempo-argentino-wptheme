<?php
$defaults = array(
    'class' => '',
    'title' => '',
    'authors' => null
);
extract(array_merge($defaults, $args));
$tw_text = $title;
if ($authors){
    $tw_text .= "%0A%0A✍️ ";
    $amount = count($authors);
    for ($i = 0; $i < $amount; $i++){
        $tw_text .= $authors[$i]->name;
        $tw_text .= $authors[$i]->social ? " (@". $authors[$i]->social['user'] . ")" : "";
        if (isset($authors[$i + 1])) {
            if ($i + 2 == $amount) {
                if (strtoupper($authors[$i + 1]->name[0]) == 'I') {
                    $tw_text .= " e ";
                } else {
                    $tw_text .= " y ";
                }
            } else {
                $tw_text .= ", ";
            }
        }
    }
}

?>
<div class="social-btns">
    <a title="Ver los comentarios de <?php echo $title; ?>" class="d-inline-block" href="#comments-container">
        <img class="img-fluid m-0" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/comentar.svg"  width="40" height="40" alt="Ver los comentarios de <?php echo $title; ?>" />
    </a>
    <?php /*
    <a tabindex="0" id="share-popover" class="share-popover" data-bs-toggle="popover" data-bs-trigger="focus">
        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/compartir.svg" alt="" />
    </a>
    */ ?>
    <a title="Compartir <?php echo $title; ?> en Facebook" class="d-inline-block" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink( get_queried_object_id() )?>">
        <img class="img-fluid m-0" src="<?php echo get_stylesheet_directory_uri()?>/assets/img/fb-share-popover.svg" width="40" height="40" alt="Compartir <?php echo $title; ?> en Facebook">
    </a>
    <a title="Compartir <?php echo $title; ?> en X" class="d-inline-block" href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&url=<?php echo get_permalink( get_queried_object_id() )?>&via=tiempoarg" target="_blank">
        <img class="img-fluid m-0" src="<?php echo get_stylesheet_directory_uri()?>/assets/img/twitter-share-popover.svg" width="40" height="40" alt="Compartir <?php echo $title; ?> en X">
    </a>
    <a title="Compartir <?php echo $title; ?> por WhatsApp" class="d-lg-none d-inline-block" href="whatsapp://send/?text=<?php echo get_permalink( get_queried_object_id() )?>" target="_blank">
        <img class="img-fluid m-0" src="<?php echo get_stylesheet_directory_uri()?>/assets/img/whatsapp-share-popover.svg" width="40" height="40" alt="Compartir <?php echo $title; ?> por WhatsApp">
    </a>
    <?php // do_action('favorite_button_action') ?>
</div>