<?php /*<div class="container-with-header newsletter">
    <div class="py-4">
        <div class="container">
            <div class="envelope-icon">
                <img src="<?php echo TA_THEME_URL; ?>/markup/assets/images/envelope.svg" alt="" />
            </div>
            <div class="section-title">
                <h4><?php echo __('Sumate a nuestro NEWSLETTER', 'gen-base-theme') ?></h4>
            </div>
            <div class="subtitle">
                <p><?php echo __('De lunes a viernes, la información necesaria para arrancar el día.', 'gen-base-theme') ?></p>
            </div>
            <div class="newsletter-form d-flex flex-column justify-content-center">
                <p><!--span>></span--><strong>No pierdas el Tiempo: </strong> <?php echo __('lo que pasó y lo que va a pasar, en un minuto.', 'gen-base-theme'); ?></p>
                <div class="input-container position-relative"> */ ?>
                    <?php if (is_active_sidebar('sidebar-1')) { ?>
                        <?php dynamic_sidebar('sidebar-1'); ?>
                    <?php } ?><?php /*
                    <!--<input type="email" placeholder="completá con tu mail_">-->
                    <img src="<?php echo TA_THEME_URL; ?>/markup/assets/images/envelope.svg" alt="" class="input-icon envelope position-absolute" id="sobre" />
                    <img src="<?php echo TA_THEME_URL; ?>/markup/assets/images/send.svg" alt="" class="input-icon send position-absolute" id="icono-newsletter" />
                </div>
                <!--<button class="mt-3">ENVIAR</button>-->
            </div>

        </div>
    </div>
</div>*/ ?>