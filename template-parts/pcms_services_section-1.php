<?php if (get_theme_mod('pcms_services_s1_enabled', true)) : ?>
    <section id="services-s1" class="my-5">
        <div class="row flex-column flex-lg-row gap-2">
            <?php 
                $infos = array('info-1', 'info-2', 'info-3', 'info-4');
                foreach ($infos as $info) {
                    ?>
                        <div class="col">
                            <div class="position-relative overlay">
                                <?php if (get_theme_mod("pcms_services_s1_image_${info}", "#")) : ?>
                                    <img src="<?=get_theme_mod("pcms_services_s1_image_${info}", "#")?>" alt="" class="ratio-1-1 img-fluid w-100 h-100">
                                <?php else : ?>
                                    <img src="<?=get_site_url();?>/wp-content/themes/projet-cms/img/<?="${info}";?>.png" alt="" class="ratio-1-1 img-fluid w-100 h-100">
                                <?php endif; ?>
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <h4 class="special-underline text-white text-center w-100"><?=get_theme_mod("pcms_services_s1_title_${info}", "#")?></h4>
                                </div>                            
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </section>
<?php endif ; ?>