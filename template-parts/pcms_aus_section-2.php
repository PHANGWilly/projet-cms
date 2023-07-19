<?php if (get_theme_mod('pcms_aus_s2_enabled', true)) : ?>
    <section class="my-5">
        <div class="row">
            <div class="col-12 d-flex flex-column gap-4 flex-lg-row align-items-center">
                <div class="col">
                    <img src="<?=get_theme_mod("pcms_aus_s2_image", "#");?>" alt="" class="w-100 h-100">
                </div>
                <div class="col d-flex flex-column gap-2">
                    <?php $infos = array ('info-1', 'info-2', 'info-3'); ?>
                    <?php 
                        foreach ($infos as $info){
                            $isEnabled = get_theme_mod("pcms_aus_s2_${info}_enabled", true);
                            if ($isEnabled) {
                                ?>
                                    <div class="container px-0">
                                        <h2><?=get_theme_mod("pcms_aus_s2_${info}_title", "#");?></h2>
                                        <p class="main-text">
                                            <?=get_theme_mod("pcms_aus_s2_${info}_description", "#");?>
                                        </p>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>