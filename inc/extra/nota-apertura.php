<?php
$article_data = get_post_meta(get_the_ID(), 'page_nota_apertura', true);
$article_id = isset($article_data['post']) ? $article_data['post'] : null;
$article = !$article_id ? null : TA_Article_Factory::get_article(get_post($article_id));
?>

<?php if ($article) : ?>
    <?php 
    $thumbnail_common_url = $article->thumbnail_common && $article->thumbnail_common['url'] ? $article->thumbnail_common['url'] : '';
    $thumbnail_alt_common_url = $article->thumbnail_alt_common && $article->thumbnail_alt_common['url'] ? $article->thumbnail_alt_common['url'] : '';
    $thumbnail_url = $thumbnail_alt_common_url ? $thumbnail_alt_common_url : $thumbnail_common_url;
    $title = $article->alt_title ? $article->alt_title : $article->title;
    $white_logo = isset($article_data['white_logo']) ? $article_data['white_logo'] : null;
    $white_title = isset($article_data['white_title']) ? $article_data['white_title'] : null;
    ?>
    <div class="big-block-container">
        <div class="big-block-content">
            <a href="">
                <div class="img-container">
                    <div class="overlay"></div>
                </div>
            </a>
            <div class="big-block-caption text-left pt-0 mb-md-4">
                <div class="separator"></div>
                <div class="category-title mt-2">
                    <h4><?= $article->cintillo; ?></h4>
                </div>
                <div class="title">
                    <a href="<?=  $article->url; ?>">
                        <p><?= $title; ?></p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <style>
        .big-block-container {
            position: absolute;
            top: 0;
            left: 0;
        }

        #headerDefault {
            margin-bottom: 100vh !important;

        }
        .header:not(.sticky) {
            background: transparent;
            box-shadow: none;
        }

        #headerDefault .desktop-ribbon,
        #headerDefault .weather,
        #headerDefault #search-btn,
        #headerDefault .logged-user,
        #headerDefault .profile-icon {
            display: none !important;
        }

        .big-block-container .img-container {
            background-image: url(<?= $thumbnail_url; ?>);
            height: 100vh;
            width: 100vw;
            background-size: cover;
            background-position: center;
        }

        .big-block-caption {
            position: absolute;
            left: 5%;
            right: 5%;
            bottom: 20px;
        }

        .big-block-caption h4 {
            font-size: 20px;
            font-family: "Red Hat Display";
            font-style: normal;
            font-weight: 900;
        }

        .big-block-caption .title p {
            font-family: "Caladea";
            font-style: normal;
            font-weight: 700;
            font-size: 70px;
            letter-spacing: -0.5px;
            line-height: 1;
        }
        <?php if ($white_title) : ?>
        .big-block-caption h4,
        .big-block-caption .title p {
            color: white
        }
        .big-block-caption a {
            text-decoration-color: #fff !important;
            color: #fff !important;
        }
        <?php endif; ?>

        <?php if ($white_logo) : ?>
        .header:not(.sticky) .tiempo-logo img {filter: invert(1);}
        <?php endif; ?>

        @media(min-width:992px) {
            .big-block-caption h4 {
                font-size: 16px;
                line-height: 20px;
            }

            .big-block-caption .title p {
                font-size: 75px;
                line-height: 45px;
            }

        }
        /* .big-block-container .overlay {
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, rgba(46, 42, 38, 0) 49.04%, #252b2d 86.07%);
            position: relative;
        } */
    </style>
<?php endif; ?>