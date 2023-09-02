<?php get_header();
do_action('header_thankyou_page');
?>

<div class="container ta-context asociate gray-border mt-2 my-lg-5">
    <div class="line-height-0">
        <div class="separator m-0"></div>
    </div>
    <div class="asociate-block-container">
        <div class="section-title p-2">
            <h4>asociate<span class="ml-2">Finalizar</span></h4>
        </div>
        <?php if (null === Subscriptions_Sessions::get_session('subscriptions_add_session') || !is_user_logged_in()) : ?>
            <div class="container">
                <div class="py-2">
                    <div class="subs-opt mt-3 mt-md-5">
                        <div class="title text-center">
                            <h4 class="italic"><?php echo __('Hola, antes debés seleccionar ', 'gen-base-theme') ?><span><?php echo __('un paquete.', 'gen-base-theme') ?></h4>
                        </div>
                        <div class="asociate-wrapper">
                            <div class="metodo-pago-block">
                                <div class="subtitle text-center mt-4">
                                    <p><?php echo __('Para continuar al pago, primero debes seleccionar un paquete, haz click en el bóton para volver.', 'gen-base-theme') ?></b>
                                </div>
                                <div class="btns-container text-center mt-4">
                                    <button><a href="<?php echo get_permalink(get_option('subscriptions_loop_page')) ?>"><?php echo __('Volver', 'gen-base-theme') ?></a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>

            <div class="container">
                <div class="container-with-header">
                    <div class="py-2">
                        <div class="subs-opt mw-md-60 mx-auto mt-3 mt-md-5">
                            <?php if (Subscriptions_Sessions::get_session('subscriptions_add_session')['suscription_address'] === '1') : ?>
                                <?php //$address = get_user_meta(get_current_user_id(), '_user_address', false); ?>
                                <?php $address = Subscriptions_Address_Helper::get_address_by_user_id(get_current_user_id()); ?>
                                <div class="asociate-wrapper address">
                                    <div class="address-block">
                                        <div class="title text-center mt-4">
                                            <h6><?php echo __('Por favor, indicamos un domicilio donde se te enviará el diario.', 'subscriptions') ?></h6>
                                        </div>
                                        <div id="msg-ok"></div>
                                        <form method="post" id="address-form" class="text-left">
                                            <div class="form-container mt-4">
                                            <div class="input-container">
                                            <select name="state" id="state" required>
                                                    <option value=""> -- seleccionar -- </option>
                                                    <option value="CABA" <?php selected('CABA',$address[0]['state'])?>>CABA</option>
                                                    <option value="gba" <?php selected('gba',$address[0]['state'])?>>Gran Buenos Aires</option>
                                                    <option value="PBA" <?php selected('PBA',$address[0]['state'])?>>Provincia de Buenos Aires</option>
                                            </select>
                                                </div>
                                                <div class="input-container">
                                                <select name="city" id="city" required>
                                                    <option value=""> -- seleccionar --</option>
                                                </select>
                                                <input type="hidden" id="localidad" value="<?php echo $address[0]['city']?>">
                                                </div>
                                                <div class="input-container">
                                                    <input type="text" placeholder="<?php echo __('Calle', 'gen-base-theme') ?>" name="address" id="address" value="<?php echo $address[0]['address'] !== null ? $address[0]['address'] : ''; ?>" required />
                                                </div>
                                                <div class="d-flex">
                                                    <div class="input-container mr-3 w-100">
                                                        <input type="text" placeholder="<?php echo __('Número', 'gen-base-theme') ?>" name="number" id="number" value="<?php echo $address[0]['number'] !== null ? $address[0]['number'] : ''; ?>" required />
                                                    </div>
                                                    <div class="input-container w-100">
                                                        <input type="text" placeholder="<?php echo __('CP', 'gen-base-theme') ?>" name="zip" id="zip" value="<?php echo $address[0]['zip'] !== null ? $address[0]['zip'] : ''; ?>" required />
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="input-container mr-3 w-100">
                                                        <input type="text" placeholder="<?php echo __('Piso', 'gen-base-theme') ?>" name="floor" id="floor" value="<?php echo $address[0]['floor'] !== null ? $address[0]['floor'] : ''; ?>"/>
                                                    </div>
                                                    <div class="input-container w-100">
                                                        <input type="text" placeholder="<?php echo __('Dpto', 'gen-base-theme') ?>" name="apt" id="apt" value="<?php echo $address[0]['apt'] !== null ? $address[0]['apt'] : ''; ?>"/>
                                                    </div>
                                                </div>
                                                <div class="input-container">
                                                    <input type="text" placeholder="<?php echo __('Entre calles 1', 'gen-base-theme') ?>" name="bstreet_1" id="bstreet_1" value="<?php echo $address[0]['bstreet_1'] !== null ? $address[0]['bstreet_1'] : ''; ?>" />
                                                </div>
                                                <div class="input-container">
                                                    <input type="text" placeholder="<?php echo __('Entre calles 2', 'gen-base-theme') ?>" name="bstreet_2" id="bstreet_2" value="<?php echo $address[0]['bstreet_2'] !== null ? $address[0]['bstreet_2'] : ''; ?>" />
                                                </div>
                                                <div class="input-container">
                                                    <textarea name="observations" placeholder="<?php echo __('Observaciones', 'gen-base-theme') ?>" class="form-control" id="observations" cols="30" rows="4"><?php echo $address[0]['observations'] !== null ? $address[0]['observations'] : ''; ?></textarea>
                                                </div>
                                                <div class="btns-container text-center mt-4">
                                                    <span class="d-none" id="loader-address">
                                                        <img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/loader-button.gif" />
                                                        <span class="text-center d-block">Un momento por favor...</span>
                                                    </span>
                                                    <button type="button" name="address-button" id="address-button"><?php echo __('Confirmar', 'gen-base-theme') ?></button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="info text-center mt-5">
                                            <h6>
                                                <?php echo sprintf(__('La distribuidora necesita %s para asignar el envío del diario para que lo recibas en tu casa', 'gen-base-theme'), '<b>' . __('15 días', 'gen-base-theme') . '</b>') ?>
                                            </h6>
                                        </div>
                                        <div class="ayuda text-center my-4">
                                            <h6>Ante cualquier duda, podés escribirnos a</h6>
                                            <h6><a class="highlighted" href="mailto:pagostiempo@gmail.com">pagostiempo@gmail.com</a></h6>
                                            <h6> o <b>llamarnos
                                                    al <a href="tel:4342-5511">4342-5511</a>.</b>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="thanks-msg" <?php if (isset($address)) echo 'style="display:none;"' ?>>
                                <div class="title text-center">
                                    <h4 class="italic m-0"><?php echo __('Gracias', 'gen-base-theme') ?> <span><?php echo wp_get_current_user()->first_name . ' ' . wp_get_current_user()->last_name ?></span>, </h4>
                                    <h4 class="italic m-0"><?php echo __('por elegir Tiempo Argentino. ¡Un medio autogestionado es posible gracias a personas como vos!', 'gen-base-theme') ?></h4>
                                    <h4 class="italic m-0"></h4>
                                </div>
                                <div class="asociate-wrapper">
                                    <!--<div class="subtitle text-center mt-4">
                                        <p>Muy pronto alguien de Tiempo Argentino te escribirá por e-mail para efectuar el pago.</p>
                                    </div>-->

                                    <div class="title text-center mt-5">
                                        <p><b><?php echo __('¿Querés contarnos un poco más de vos?','gen-base-theme')?></b></p>
                                    </div>
                                    <div class="text-center">
                                        <p><?php echo __('Podemos ofrecerte contenidos de acuerdo a tus preferencias','gen-base-theme')?></p>
                                    </div>
                                    <div class="btns-container text-center">
                                        <button><a href="<?php echo get_permalink(get_option('personalize'))?>"><?php echo __('Personalizar','gen-base-theme')?></a></button>
                                        <button class="gray-btn-black-text"><a href="<?php echo home_url()?>"><?php echo __('ir al sitio','gen-base-theme')?></a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer() ?>