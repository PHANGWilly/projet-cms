
<?php if (get_theme_mod('pcms_services_s2_enabled', true)) : ?>
    <section id="services-s2" class="my-5">
        <div class="d-flex flex-column gap-4">
            <h2><?= get_theme_mod("pcms_services_s2_title", "#");?></h2>
            <p class="col-12 col-lg-6 main-text">
                <?= nl2br(esc_html(get_theme_mod("pcms_services_s2_title_description", "#")));?>
            </p>
            <?php if (get_theme_mod("pcms_services_s2_image", "#")) : ?>
                <img src="<?= get_theme_mod("pcms_services_s2_image", "#");?>" alt="" class="img-fluid w-100 h-100">
            <?php else : ?>
                <img src="<?=get_site_url();?>/wp-content/themes/projet-cms/img/services-info.png" alt="" class="img-fluid w-100 h-100">
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>