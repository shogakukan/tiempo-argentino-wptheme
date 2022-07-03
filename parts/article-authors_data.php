<?php
$defaults = array(
    'article'   => null,
    'size'      => 'desktop',
    'special_format' => false
);
extract(array_merge($defaults, $args));
if (!$article)
    return;

if (!$article->authors || empty($article->authors))
    return;
?>
<?php $displayClass = $size == 'desktop' ? 'd-none d-sm-flex d-md-flex d-lg-flex' : 'd-flex d-sm-none d-md-none d-lg-none' ?>
<div class="<?= $displayClass ?> flex-column flex-md-row mt-2 mt-md-3">
    <?php if ($size == 'desktop') : ?>
        <?php if ($special_format) : ?>
            <div class="author d-flex mx-2">
        <?php endif; ?>
            <?php foreach ($article->authors as $author) : ?>
                <?php if (!$special_format) : ?>
                    <div class="author d-flex mx-2">
                <?php endif; ?>
                    <?php if (!$author->has_photo) : ?>
                        <div class="author-icon mr-2">
                            <img src="<?php echo TA_THEME_URL; ?>/assets/img/author-pen.svg" alt="" />
                        </div>
                    <?php else : ?><div class="author-icon mr-2">
                            <div class="author-img" style="background-image: url('<?php echo esc_attr($author->photo); ?>');float:right;">
                                <div class="author-icon mr-2">
                                    <img src="<?php echo TA_THEME_URL; ?>/assets/img/author-pen.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                        <div class="author-info mr-2">
                            <p>Por: <a href="<?php echo esc_attr($author->archive_url); ?>"><?php echo esc_html($author->name); ?></a></p>
                            <?php if (isset($article->authors_roles[$author->ID]) && $article->authors_roles[$author->ID]) : ?>
                                <p><?php echo esc_html($article->authors_roles[$author->ID]); ?></p>
                            <?php endif; ?>
                            <?php if ($author->social) : ?>
                                <a href="<?php echo esc_attr($author->social['url']); ?>">@<?php echo esc_html($author->social['user']); ?></a>
                            <?php endif; ?>
                        </div>
                <?php if (!$special_format) : ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php if ($special_format) : ?>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <div class="author d-flex mr-2">
            <div class="author-info">
                <p>Por:
                    <?php $authors = $article->authors;
                    $amount = count($authors); ?>
                    <?php for ($i = 0; $i < $amount; $i++) : ?>
                        <a href="<?php echo esc_attr($authors[$i]->archive_url); ?>"><?php echo esc_html($authors[$i]->name); ?></a>
                        <?php
                        if (isset($authors[$i + 1])) {
                            if ($i + 2 == $amount) {
                                if (strtoupper($authors[$i + 1]->name[0]) == 'I') {
                                    echo " e";
                                } else {
                                    echo " y";
                                }
                            } else {
                                echo ",";
                            }
                        }
                        ?>
                    <?php endfor; ?>
                </p>
            </div>
        </div>
    <?php endif; ?>
</div>