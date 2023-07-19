<?php if (get_theme_mod('pcms_aus_s1_enabled', true)) : ?>
    <section class="my-5">
        <div class="row">
            <img src="<?=get_theme_mod( "pcms_aus_s1_image", "#");?>" alt=""  class="w-100">
        </div>
        <div class="row my-5">
                <div class="col-12">
                    <div class="col col-lg-6 mx-lg-auto">
                        <h2><?=get_theme_mod("pcms_aus_s2_title", "#");?></h2>
                        <p class="main-text">
                            <?=get_theme_mod("pcms_aus_s2_title_description", "#");?>
                        </p>
                    </div>
                </div>
        </div>
    </section>
<?php endif; ?>