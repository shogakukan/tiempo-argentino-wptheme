<?php if (get_option('ultimo_momento_option_name')['ultimo_momento'] == '') : ?>
<div class="banner-nuevo-tiempo tiempo-blue-bg">
    <div class="container">
        <a style="text-decoration: none;" href="<?php echo get_permalink(65814)?>" class="d-flex flex-column flex-md-row justify-content-md-center text-center py-3">
        <div class="title">
            <p><?php echo __('Conocé el nuevo Tiempo Argentino','gen-base-theme')?></p>
        </div>
        <div class="btns-container">
            <div class="ver-mas">
                <button><?php echo __('saber más','gen-base-theme')?></button>
            </div>
        </div>
        </a>
    </div>
</div>
<?php else: ?>
    <div class="wp-block-columns urgente-portada mb-0">
        <div class="wp-block-column" style="flex-basis:33%">
            <div class="wp-block-columns mb-0">
                <div class="wp-block-column">
                    <h4>URGENTE</h4>
                </div>

                <div class="wp-block-column">
                    <figure class="wp-block-image size-large mb-0"><img src="https://www.tiempoar.com.ar/wp-content/uploads/2021/04/svg-path.svg" alt="" class="wp-image-69617" /></figure>
                </div>
            </div>
        </div>
        <div class="wp-block-column">
            <h4><?= get_option('ultimo_momento_option_name')['ultimo_momento'] ?></h4>
        </div>
    </div>


    <style>
        .urgente-portada .wp-block-column {
            flex-basis: auto !important;
        }

        @media (min-width: 782px) {
            .urgente-portada .wp-block-column:not(:first-child) {
                margin-left: 1em;
            }
        }


        .urgente-portada {
            margin-top: 1.75em;
        }


        .urgente-portada .wp-block-column:first-child h4 {
            color: white;
            display: inline-block;
            vertical-align: top;
            background: #cf2e2e;
            padding-left: 5px;
            padding-right: 5px;
        }

        .urgente-portada .wp-block-column:first-child .wp-block-column:first-child {
            background: #cf2e2e;
            height: 2em;
        }

        .urgente-portada img {
            height: 2em;
        }

        .urgente-portada .wp-block-column:first-child .wp-block-column:first-child+div {
            margin: 0px;
        }
    </style>

<?php endif; ?>