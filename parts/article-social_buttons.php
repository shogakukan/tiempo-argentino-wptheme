<?php
$defaults = array(
    'class' => '',
    'title' => '',
    'authors' => null
);
extract(array_merge($defaults, $args));
$tw_text = $title;
if ($authors){
    $tw_text .= " - Por ";
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
    <a href="#comments-container">
        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/comentar.svg" alt="" />
    </a>
    <?php /*
    <a tabindex="0" id="share-popover" class="share-popover" data-bs-toggle="popover" data-bs-trigger="focus">
        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/compartir.svg" alt="" />
    </a>
    */ ?>
    <a href="https://facebook.com/sharer.php?u=<?php echo get_permalink( get_queried_object_id() )?>" target="_blank">
        <img class="img-fluid m-0" src="<?php echo get_stylesheet_directory_uri()?>/assets/img/fb-share-popover.svg">
    </a>
    <a href="https://twitter.com/intent/tweet?url=<?php echo $tw_text . " " . get_permalink( get_queried_object_id() )?>" target="_blank">
        <img class="img-fluid m-0" src="<?php echo get_stylesheet_directory_uri()?>/assets/img/twitter-share-popover.svg">
    </a>
    <a href="whatsapp://send/?text=<?php echo get_permalink( get_queried_object_id() )?>" target="_blank" class="d-lg-none">
        <img class="img-fluid m-0" src="<?php echo get_stylesheet_directory_uri()?>/assets/img/whatsapp-share-popover.svg">
    </a>
    <?php // do_action('favorite_button_action') ?>
</div>