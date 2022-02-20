<?php
$defaults = array(
    'photographer'      => null,
    'caption'           => null
);
extract(array_merge($defaults, $args));

if(!$photographer || !$photographer->name)
    return;

$ta_photographer_class = $photographer->is_from_ta ? 'ta-photographer' : '';
$has_caption_class = $caption ? 'has-caption' : '';

?>
<div class="credits text-right mt-2 d-flex justify-content-end align-items-center<?= ' ' . $ta_photographer_class . ' ' . $has_caption_class?>">
    <div class="credits-info d-flex flex-column mr-lg-2">
        <p>Foto: <?php echo esc_html($photographer->name); ?></p>
        <?php if($photographer->main_red_social): ?>
        <a target="_blank" href="<?php echo esc_attr($photographer->main_red_social['url']); ?>">@<?php echo esc_html($photographer->main_red_social['username']); ?></a>
        <?php endif; ?>
    </div>
    <?php if($photographer->is_from_ta): ?>
    <div class="credits-icon">
        <img src="<?php echo TA_THEME_URL ?>/assets/img/camera-icon.svg" alt="" />
    </div>
    <?php endif; ?>
</div>
