<?php if (get_theme_mod('pcms_aus_s3_enabled', true)) : ?>
    <section class="my-5">
        <div class="col-12 mb-4">
            <h2><?=get_theme_mod("pcms_aus_s3_title");?></h2>
        </div>
        <div class="col-12 d-flex flex-column flex-lg-row gap-4">
            <?php $s3Infos = array('s3-info-1', 's3-info-2', 's3-info-3', 's3-info-4'); ?>
            <?php $icons = array ('email', 'phone', 'linkedin'); ?>
            <?php 
                foreach ($s3Infos as $s3Info) {
                    ?>
                        <div class="col-12 col-lg d-flex flex-column gap-1 gap-lg-4">
                            <?php if(get_theme_mod("pcms_aus_s3_${s3Info}_image")) : ?>
                                <img src="<?=get_theme_mod("pcms_aus_s3_${s3Info}_image");?>" alt="" class="w-100 h-100">
                            <?php else : ?>
                                <img src="get_site_url();?>/wp-content/themes/projet-cms/img/<?="${s3Info}";?>.png" alt="" class="w-100 h-100">
                            <?php endif; ?>
                            <div class="container">
                                <h3><?=get_theme_mod("pcms_aus_s3_${s3Info}_membre");?></h3>
                                <div class="aus-social-links">
                                    <?php
                                        foreach ($icons as $icon) {
                                            if ($icon == 'linkedin') {
                                                $iconUrl = get_theme_mod("pcms_aus_s3_${s3Info}_${icon}_link", '#');
                                                echo '<a href="' . esc_url($iconUrl) . '" class="aus-social-link">' . getIcon($icon) . '</a>';
                                            } 

                                            if ($icon == 'phone') {
                                                $iconUrl = get_theme_mod("pcms_aus_s3_${s3Info}_${icon}_link", '#');
                                                $iconUrl = str_replace("0", "+33", $iconUrl);
                                                $iconUrl = str_replace("http://", "", $iconUrl);
                                                echo '<a href="tel:'.$iconUrl.'" class="aus-social-link">' . getIcon($icon) . '</a>';
                                            }

                                            if ($icon == 'email') {
                                                $iconUrl = get_theme_mod("pcms_aus_s3_${s3Info}_${icon}_link", '#');
                                                $subject = get_theme_mod("pcms_aus_s3_${s3Info}_${icon}_subject", '#');
                                                $user = get_theme_mod("pcms_aus_s3_${s3Info}_membre");
                                                $iconUrl = str_replace("http://", "", $iconUrl);
                                                echo '<a href="mailto:'.$iconUrl.'?subject='.$subject.' - '.$user.'" class="aus-social-link">' . getIcon($icon) . '</a>';
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </section>
<?php endif; ?>