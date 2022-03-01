<!-- widget sobre la nota -->
<?php if (is_active_sidebar('article_desktop_posheader')) { ?>
    <div class="container d-none d-sm-none d-md-block mt-md-3 mb-md-3">
        <div class="row d-flex">
            <div class="text-center mx-auto">
                <?php dynamic_sidebar('article_desktop_posheader'); ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (is_active_sidebar('article_mobile_posheader')) { ?>
    <div class="container d-block d-sm-none d-md-none d-lg-none mt-md-3 mb-md-3 mt-3">
        <div class="row d-flex">
            <div class="text-center mx-auto">
                <?php dynamic_sidebar('article_mobile_posheader'); ?>
            </div>
        </div>
    </div>
<?php } ?>
<!-- widget sobre la nota -->
