<?php
$article_id = get_post_meta(get_the_ID(), 'page_nota_apertura', true);
$article = !$article_id ? null : TA_Article_Factory::get_article(get_post($article_id));
$thumbnail_common_url = $article->thumbnail_common && $article->thumbnail_common['url'] ? $article->thumbnail_common['url'] : '';
$thumbnail_alt_common_url = $article->thumbnail_alt_common && $article->thumbnail_alt_common['url'] ? $article->thumbnail_alt_common['url'] : '';
$thumbnail_url = $thumbnail_alt_common_url ? $thumbnail_alt_common_url : $thumbnail_common_url;
$title = $article->alt_title ? $article->alt_title : $article->title;
?>

<?php if ($article) : ?>
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
            color: white;
        }
        .big-block-caption a {
            text-decoration-color: #fff !important;
            color: #fff !important;
        }

        .big-block-caption .title p {
            font-family: "Caladea";
            font-style: normal;
            font-weight: 700;
            font-size: 70px;
            letter-spacing: -0.5px;
            line-height: 1;
            color: white;
        }
        .header:not(.sticky) .tiempo-logo img {
            filter: invert(1);
        }
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
        @media(max-width:991px) {

        }
    </style>
<?php endif; ?>