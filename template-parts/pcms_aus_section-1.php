<?php if (get_theme_mod('pcms_aus_s1_enabled', true)) : ?>
    <section class="my-5">
        <div class="row">
            <?php if (get_theme_mod( "pcms_aus_s1_image", "#")) : ?>
                <img src="<?=get_theme_mod( "pcms_aus_s1_image", "#");?>" alt=""  class="w-100">
            <?php else : ?>
                <img src="<?=get_site_url();?>/wp-content/themes/projet-cms/img/aus-s1-image.png" alt="" class="w-100">
            <?php endif; ?>
        </div>
        <div class="row my-5">
            <div class="col-12">
                <div class="col col-lg-6 mx-lg-auto">
                    <h2><?=get_theme_mod("pcms_aus_s1_title", "#");?></h2>
                    <p class="main-text">
                        <?=nl2br(esc_html(get_theme_mod("pcms_aus_s1_title_description", "#")));?>
                    </p>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>