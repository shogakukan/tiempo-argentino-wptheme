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
<div class="tiempo-audiovisual-container container-with-header ta-context dark-blue py-3" style="display:none;">
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
                                    <?php $first_video = esc_html($av_artcile->get_video()); ?>
                                    <?php $first_title = $av_artcile->title; ?>
                                    <div class="col-md-8 col-12 article-preview video-preview">
                                        <div class="img-container video" id="player">
                                            <iframe width="100%" height="100%" loading="lazy" src="https://www.youtube.com/embed/<?php echo $first_video; ?>" title="<?= $first_title ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen onload="onYouTubeIframeAPIReady()">
                                            </iframe>
                                        </div>
                                        <div class="content mt-2">
                                            <div class="title" id="video-main-title">
                                                <p>
                                                    <span class="cintillo" style="color:var(--ta-celeste)">
                                                        <?php if ($av_artcile->cintillo) : ?>
                                                            <?= $av_artcile->cintillo . " | " ?>
                                                        <?php endif; ?>
                                                    </span>
                                                    <span class="titulo"><?= $first_title ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator d-block d-md-none m-3"></div>
                                    <div class="col-md-4 col-12 article-preview video-list" style="overflow: scroll;">
                                    <?php endif; ?>
                                    <div class="row content" data-titulo="<?= $av_artcile->title ?>" data-cintillo="<?= $av_artcile->cintillo ?>" data-video="<?php echo esc_html($av_artcile->get_video()); ?>" onclick="setVideoId(this);" style="cursor: pointer;">
                                        <div class="col-md-5 col-12">
                                            <!-- <img width="100%" src="<?= $av_artcile->get_thumbnail_common(null, 'medium')['url'] ?>" /> -->
                                            <div class="img-container">
                                                <div class="img-wrapper d-flex align-items-end lazy" data-thumbnail style='background-image: url("https://img.youtube.com/vi/<?php echo esc_html($av_artcile->get_video()); ?>/mqdefault.jpg");'>
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
            display: inline-flex;
            margin: 0 !important;
            width: 150px;
            height: 100%;
            align-content: flex-start;
        }

        .tiempo-audiovisual .video-list {
            white-space: nowrap;
            height: auto !important;
        }

        .tiempo-audiovisual .video-list .img-wrapper {
            padding-bottom: 100px;
        }

        .tiempo-audiovisual .video-list .title p {
            white-space: pre-wrap;
        }
    }
</style>

<script>
    window.onload = function() {
        document.querySelector(".tiempo-audiovisual-container").style.display = "block";
    }
    var video_id = '<?php echo $first_video; ?>';

    function onYouTubeIframeAPIReady() {

        let videoColumn = document.querySelector(".video-preview");
        let innerDivs = videoColumn.querySelectorAll("div.video, div.content");
        (function($) {
            let $tav_container = $('.tiempo-audiovisual .img-container.video');
            if ($tav_container && $tav_container.get(0)) {
                let new_height = $tav_container.get(0).scrollWidth * 9 / 16;
                $tav_container.css('height', new_height);
                $('.tiempo-audiovisual .col-3.article-preview').css('height', new_height);
            }
        })(jQuery);
        let feauteredHeight = 0;
        innerDivs.forEach(d => {
            feauteredHeight += d.offsetHeight;
        });
        let videoList = document.querySelector(".video-list");
        videoList.style.height = feauteredHeight + "px";

    }
    let spanTituloAv = document.querySelector('#video-main-title .titulo');
    let spanCintilloAv = document.querySelector('#video-main-title .cintillo');
    function setVideoId(videoEl) {
        if (videoEl.dataset.video && videoEl.dataset.video != video_id) {
            video_id = videoEl.dataset.video;
            document.querySelector('#player').innerHTML = `<iframe width="100%" height="100%" loading="lazy" src="https://www.youtube.com/embed/${video_id}" title="${videoEl.dataset.titulo}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
            spanTituloAv.innerText = videoEl.dataset.titulo;
            spanCintilloAv.innerText = videoEl.dataset.cintillo ? videoEl.dataset.cintillo + " | " : "";
        }
    }
</script>