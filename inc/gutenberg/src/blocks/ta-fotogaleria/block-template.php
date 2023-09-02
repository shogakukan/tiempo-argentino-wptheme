<?php
$args = array(
    'post_type'  => 'ta_article',
    'orderby' => 'date',
    'order' => 'DESC',
    'meta_query' => array(
        array(
            'key'   => 'ta_article_special_format',
            'value' => 'fotogaleria',
        )
    )
);
$posts_list = get_posts($args);
if (!$posts_list) return;
$posts_list = array_slice($posts_list, 0, 10);

?>
<div class="tiempo-fotogaleria-container container-with-header ta-context dark-blue py-3" style="display:none;">
    <div class="context-color">
        <div class="container line-height-0">
            <div class="separator m-0"></div>
        </div>
        <div class="context-bg  py-3">
            <div class="container ">
                <a href="/tiempo-fotogaleria" class="section-title">
                    <h4>FOTOGALERÍAS</h4>
                </a>
            </div>
            <div class="sub-blocks mt-3">
                <div class="container">
                    <div class="tiempo-fotogaleria row">
                        <?php foreach ($posts_list as $i => $post) : ?>
                            <?php $fg_article = TA_Article_Factory::get_article($post, 'article_post'); ?>
                            <?php if ($fg_article) : ?>
                                <?php if ($i === array_key_first($posts_list)) : ?>
                                    <?php
                                        $thumbnail = $fg_article->get_thumbnail_alt_common() ? $fg_article->get_thumbnail_alt_common() : $fg_article->get_thumbnail_common();
                                        $first_image_url = $thumbnail ? $thumbnail['url'] : '';
                                        ?>
                                    <?php $first_title = $fg_article->title; ?>
                                    <div class="col-md-8 col-12 article-preview main-preview">
                                        <div class="img-container" id="main-fotogaleria">
                                            <img src="<?= $first_image_url ?>" />
                                        </div>
                                        <div class="content mt-2">
                                            <div class="title" id="fotogaleria-main-title">
                                                <p>
                                                    <span class="cintillo" style="color:var(--ta-celeste)">
                                                        <?php if ($fg_article->cintillo) : ?>
                                                            <?= $fg_article->cintillo . " | " ?>
                                                        <?php endif; ?>
                                                    </span>
                                                    <span class="titulo"><?= $first_title ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator d-block d-md-none m-3"></div>
                                    <div class="col-md-4 col-12 article-preview fotogaleria-list" style="overflow: scroll;">
                                    <?php endif; ?>
                                    <?php
                                    $thumbnail = $fg_article->get_thumbnail_alt_common() ? $fg_article->get_thumbnail_alt_common() : $fg_article->get_thumbnail_common();
                                    $image_url = $thumbnail ? $thumbnail['url'] : '';
                                    ?>
                                    <div class="row content" data-titulo="<?= $fg_article->title ?>" data-cintillo="<?= $fg_article->cintillo ?>" data-img="<?php echo $image_url ?>" onclick="setGaleria(this);" style="cursor: pointer;">
                                        <div class="col-md-5 col-12">
                                            <div class="img-container">
                                                <div class="img-wrapper d-flex align-items-end lazy" data-thumbnail style='background-image: url("<?php echo $image_url ?>");'>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-12 title pl-0" data-cintillo="<?= $fg_article->cintillo ?>">
                                            <p><?= $fg_article->title ?></p>
                                        </div>
                                    </div>
                                    <?php if ($i === array_key_last($posts_list)) : ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @media(max-width:767px) {
        .tiempo-fotogaleria .row.content {
            display: inline-flex;
            margin: 0 !important;
            width: 150px;
            height: 100%;
            align-content: flex-start;
        }

        .tiempo-fotogaleria .fotogaleria-list {
            white-space: nowrap;
            height: auto !important;
        }

        .tiempo-fotogaleria .fotogaleria-list .img-wrapper {
            padding-bottom: 100px;
        }

        .tiempo-fotogaleria .fotogaleria-list .title p {
            white-space: pre-wrap;
        }
    }
    #main-fotogaleria img {
            width: 100%;
            height: auto;
        }
</style>

<script>
    window.onload = function() {
        document.querySelector(".tiempo-fotogaleria-container").style.display = "block";
        document.querySelector('.main-preview')
        (function($) {
            let $fg_container = $('.tiempo-audiovisual .main-preview');
            if ($fg_container && $fg_container.get(0)) {
                let new_height = $fg_container.get(0).scrollHeight;
                $('.tiempo-audiovisual .fotogaleria-list').css('height', new_height);
            }
        })(jQuery);
    }
    var image_url = '<?php echo $first_image_url; ?>';
    
    
    function setGaleria(fotogaleriaEl) {
        if (fotogaleriaEl.dataset.img && fotogaleriaEl.dataset.img != image_url) {
            image_url = fotogaleriaEl.dataset.img;
            document.querySelector('#main-fotogaleria img').src = image_url;
            spanTitulo.innerText = fotogaleriaEl.dataset.titulo;
            spanCintillo.innerText = fotogaleriaEl.dataset.cintillo ? fotogaleriaEl.dataset.cintillo + " | " : "";
        }
    }
</script>