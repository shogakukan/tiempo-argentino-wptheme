<?php $authors = getTodayAuthors(); ?>
<?php if ($authors) : ?>
    <div class="container-with-header ta-context dark-blue py-3">
        <div class="context-color">
            <div class="container line-height-0">
                <div class="separator m-0"></div>
            </div>
            <div class="context-bg py-3 article-preview">
                <div class="container ">
                    <a class="section-title">
                        <h4>Escriben hoy</h4>
                    </a>
                </div>
                <div class="sub-blocks mt-3 content">
                    <div class="container article-info-container">
                        <div class="author"><p>
                            <?php foreach ($authors as $i => $author) : ?>
                                <a href="<?php echo $author->archive_url; ?>"><?php echo $author->name; ?></a>
                                <?php if ($i !== array_key_last($authors)) echo "|"; ?>
                            <?php endforeach; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
