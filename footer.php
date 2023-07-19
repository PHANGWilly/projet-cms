    </div>
</main>
<!-- END MAIN-->

<!-- START FOOTER-->
<footer id="footer-site">
    <div class="container px-4 px-lg-0 py-4 h-100 d-flex flex-column justify-content-between">
        <div class="row py-4 gap-4 gap-lg-0">
            <div class="col-12 col-lg-6">
                <div class="logo-footer d-flex justify-content-center justify-content-lg-start">
                    <?php 
                        if(!get_theme_mod( "pcms_f_logo", '')){
                            ?>
                                <img src="<?=get_site_url();?>/wp-content/themes/projet-cms/img/logo-footer.png" alt="">
                            <?php
                        }else {
                            ?>
                                <img src="<?=get_theme_mod( "pcms_f_logo", '')?>" alt="">
                            <?php
                        }
                    ?>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="d-flex flex-column justify-content-center flex-lg-row justify-content-lg-end gap-4">
                    <?php
                        $membres = array('membre-1', 'membre-2');
                        foreach ($membres as $membre) {
                            $isEnabled = get_theme_mod("pcms_f_${membre}_enabled", true);
                            if ($isEnabled) {
                                ?>
                                    <div class="col-12 col-lg-4 d-flex flex-column align-items-center align-items-lg-end">
                                        <h4 class="footer-member-names fs-5"><?=get_theme_mod("pcms_f_${membre}_names", '');?></h4>
                                        <h6 class="footer-member-post fs-6"><?=get_theme_mod("pcms_f_${membre}_post", '');?></h6>
                                        <?php 
                                            $tel = get_theme_mod("pcms_f_${membre}_phone", '#');
                                            if($tel != '#'){
                                                $telLink = str_replace(' ', '', $tel);
                                                $telLink = substr($telLink, 1);
                                                $telLink = '+33' . $telLink;
                                            }
                                        ?>
                                        <a href="tel:<?=$telLink;?>" class="footer-member-link"><?=$tel;?></a>
                                        <a href="mailto:<?=get_theme_mod( "pcms_f_${membre}_email", '#' );?>?subject=Contact pour - <?=get_theme_mod("pcms_f_${membre}_names", '');?>" class="footer-member-link"><?=get_theme_mod( "pcms_f_${membre}_email", '#' );?></a>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="row py-4 gap-3 d-flex flex-column flex-lg-row gap-lg-0 align-items-center">
            <?php 
                wp_nav_menu(
                    [
                        'theme_location'  => 'footer',
                        'menu_class'      => 'list-nav list-unstyled d-flex justify-content-center gap-2',
                    ]
                );
            ?>
        </div>
        <div class="row py-4 gap-3 d-flex flex-column flex-lg-row gap-lg-0 align-items-center">
            <div class="col-12 col-lg-6">
                <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                    <span class="motto"><?= get_bloginfo($show = 'description') ?></span>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="footer-icons">
                    <nav>
                        <ul class="socials list-unstyled d-flex justify-content-center justify-content-lg-end gap-4">
                            <?php
                                $icons = array('linkedin', 'facebook', 'twitter', 'email', 'phone');
                                foreach ($icons as $icon) {
                                    $isEnabled = get_theme_mod("pcms_f_${icon}_enabled", true);
                                    if ($isEnabled) {
                                        if($icon == 'facebook' || $icon == 'linkedin' || $icon == 'twitter'){
                                            $iconUrl = get_theme_mod("pcms_f_${icon}_link", '#');
                                            echo '<li>';
                                            echo '<a href="' . esc_url($iconUrl) . '" class="social-footer-link">' . getIcon($icon) . '</a>';
                                            echo '</li>';
                                        }
                                        if($icon == 'phone'){
                                            $iconUrl = get_theme_mod("pcms_f_${icon}_link", '#');
                                            $iconUrl = str_replace("0", "+33", $iconUrl);
                                            $iconUrl = str_replace("http://", "", $iconUrl);
                                            echo '<li>';
                                            echo '<a href="tel:'.$iconUrl.'" class="social-footer-link">' . getIcon($icon) . '</a>';
                                            echo '</li>';
                                        }
                                        if($icon == 'email'){
                                            $iconUrl = get_theme_mod("pcms_f_${icon}_link", '#');
                                            $subject = get_theme_mod("pcms_f_${icon}_subject", '#');
                                            $iconUrl = str_replace("http://", "", $iconUrl);
                                            echo '<li>';
                                            echo '<a href="mailto:'.$iconUrl.'?subject='.$subject.'" class="social-footer-link">' . getIcon($icon) . '</a>';
                                            echo '</li>';
                                        }
                                    }
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</footer>
<!-- END FOOTER-->

<?php wp_footer(); ?>

</body>

</html>