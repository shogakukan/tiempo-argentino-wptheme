<?php
$args = array(
    'post_type'  => 'ta_article',
    'orderby' => 'date',
    'order' => 'DESC',
    'meta_query' => array(
        array(
            'key'   => 'ta_article_special_format',
            'value' => 'audiovisual',
        )
    )
);
$posts_list = get_posts($args);
if (!$posts_list) return;
$posts_list = array_slice($posts_list, 0, 10);

?>
<div class="container-with-header ta-context dark-blue py-3">
    <div class="context-color">
        <div class="container line-height-0">
            <div class="separator m-0"></div>
        </div>
        <div class="context-bg  py-3">
            <div class="container ">
                <a href="/tiempo-audiovisual" class="section-title">
                    <h4>TIEMPO AUDIOVISUAL</h4>
                </a>
            </div>
            <div class="sub-blocks mt-3">
                <div class="container">
                    <div class="tiempo-audiovisual row">
                        <?php foreach ($posts_list as $i => $post) : ?>
                            <?php $av_artcile = TA_Article_Factory::get_article($post, 'article_post'); ?>
                            <?php if ($av_artcile) : ?>
                                <?php if ($i === array_key_first($posts_list)) : ?>
                                    <div class="col-md-9 col-12 article-preview">
                                        <div class="img-container video" id="player"></div>
                                        <div class="content mt-2">
                                            <div class="title" id="video-main-title">
                                                <p>
                                                    <span class="cintillo" style="color:var(--ta-celeste)">
                                                        <?php if ($av_artcile->cintillo) : ?>
                                                            <?= $av_artcile->cintillo . " | " ?>
                                                        <?php endif; ?>
                                                    </span>
                                                    <span class="titulo"><?= $av_artcile->title ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        var tag = document.createElement('script');

                                        tag.src = "https://www.youtube.com/iframe_api";
                                        var firstScriptTag = document.getElementsByTagName('script')[0];
                                        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


                                        var player;
                                        var video_id = '<?php echo esc_html($av_artcile->get_video()); ?>';
                                        var divTitle = document.getElementById('video-main-title');
                                        var spanTitulo = divTitle.querySelector('.titulo');
                                        var spanCintillo = divTitle.querySelector('.cintillo');

                                        function getPlayer() {
                                            if (typeof player === 'object') {
                                                return player;
                                            } else {
                                                player = new YT.Player('player', {
                                                    height: '100%',
                                                    width: '100%',
                                                    videoId: video_id,
                                                    playerVars: {
                                                        'modestbranding': 1,
                                                        'controls': 0
                                                    },
                                                });
                                            }
                                        }

                                        function onYouTubeIframeAPIReady() {
                                            getPlayer();
                                        }

                                        function setVideoId(videoEl) {
                                            if (videoEl.dataset.video && videoEl.dataset.video != video_id) {
                                                getPlayer().stopVideo();
                                                video_id = videoEl.dataset.video;

                                                spanTitulo.innerText = videoEl.dataset.titulo;
                                                spanCintillo.innerText = videoEl.dataset.cintillo ? videoEl.dataset.cintillo + " | " : "";

                                                getPlayer().loadVideoById({
                                                    videoId: video_id
                                                });
                                            }
                                        }
                                    </script>
                                    <div class="separator d-block d-md-none m-3"></div>
                                    <div class="col-md-3 col-12 article-preview" style="overflow: scroll;white-space:nowrap">
                                    <?php endif; ?>
                                    <div class="row content" data-titulo="<?= $av_artcile->title ?>" data-cintillo="<?= $av_artcile->cintillo ?>" data-video="<?php echo esc_html($av_artcile->get_video()); ?>" onclick="setVideoId(this);" style="cursor: pointer;">
                                        <div class="col-md-5 col-12">
                                            <!-- <img width="100%" src="<?= $av_artcile->get_thumbnail_common(null, 'medium')['url'] ?>" /> -->
                                            <div class="img-container">
                                                <div class="img-wrapper d-flex align-items-end lazy" data-thumbnail style='background-image: url("<?php echo $av_artcile->get_thumbnail_common(null, 'medium')['url']; ?>");'>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-12 title pl-0" data-cintillo="<?= $av_artcile->cintillo ?>">
                                            <p><?= $av_artcile->title ?></p>
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
        .tiempo-audiovisual .row.content {
            display: inline-block;
            margin: 0 !important;
        }
    }
</style>