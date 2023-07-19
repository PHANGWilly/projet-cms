
<?php if (get_theme_mod('pcms_services_s2_enabled', true)) : ?>
    <section id="services-s2" class="my-5">
        <div class="d-flex flex-column gap-4">
            <h2><?= get_theme_mod("pcms_services_s2_title", "#");?></h2>
            <p class="col-12 col-lg-6 main-text">
                <?= get_theme_mod("pcms_services_s2_title_description", "#");?>
            </p>
            <img src="<?= get_theme_mod("pcms_services_s2_image", "#");?>" alt="" class="img-fluid w-100 h-100">
        </div>
    </section>
<?php endif; ?>