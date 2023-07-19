<?php if (get_theme_mod('pcms_partners_s1_enabled', true)) : ?>
    <section id="partners-s1" class="my-4">
        <div class="row d-flex flex-row flex-wrap">
            <?php 
                $partners = array('partner-1', 'partner-2', 'partner-3', 'partner-4', 'partner-5', 'partner-6');
                foreach ($partners as $partner) {
                    ?>
                        <div class="col-6 col-lg-2 col-lg d-flex align-items-center justify-content-center">
                            <a href="<?= get_theme_mod("pcms_partners_link_${partner}", "#");?>" class="partner-link d-block">
                                <?php if (get_theme_mod("pcms_partners_logo_${partner}", "#")) : ?>
                                    <img src="<?= get_theme_mod("pcms_partners_logo_${partner}", "#");?>" alt="" class="partner-logo d-flex align-items-center w-100 h-100 w-lg-50 h-lg-50">
                                <?php else : ?>
                                    <img src="<?=get_site_url();?>/wp-content/themes/projet-cms/img/<?="${partner}";?>.png" alt="" class="partner-logo d-flex align-items-center w-100 h-100 w-lg-50 h-lg-50">
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php
                }
            ?>
        </div>
    </section>
<?php endif ; ?>