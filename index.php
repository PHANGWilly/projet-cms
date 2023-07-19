<?php
/*
    Theme Name : Projet CMS
    Author : HAILLOUY Matiss, MOHAMED Sohaib, PHANG Willy, PARACHA Jan Mustapha ESGI 2023
    Description : Thème pour le Projet CMS - ESGI 2022-2023
    Author URI: https://wordpress.org/
*/
?>
<?php get_header() ?>

<?php 
$parts = array('AboutUs', 'Services', 'Partners'); 
$sections_aus = array ('section-1', 'section-2', 'section-3');
$sections_services = array ('section-1', 'section-2');
$sections_partners = array ('section-1');
?>
<?php 
    foreach ($parts as $part) { 
        echo "<div class='py-5'>";       
        if ($part == 'AboutUs') {
            if (get_theme_mod("pcms_index_${part}_enabled", true)) {
                echo '<h1>'.get_theme_mod("pcms_index_title_${part}", "#").'</h1>'; 
                foreach ($sections_aus as $section_aus) {
                    if (get_theme_mod("pcms_index_${part}_${section_aus}_enabled", true)){
                        get_template_part("template-parts/pcms_aus_${section_aus}");
                    }
                }
            }
        }

        if ($part == 'Services') {
            if (get_theme_mod("pcms_index_${part}_enabled", true)) {
                echo '<h1>'.get_theme_mod("pcms_index_title_${part}", "#").'</h1>'; 
                foreach ($sections_services as $section_services) {
                    if (get_theme_mod("pcms_index_${part}_${section_services}_enabled", true)){
                        get_template_part("template-parts/pcms_services_${section_services}");
                    }
                }
            }
        }

        if ($part == 'Partners') {
            if (get_theme_mod("pcms_index_${part}_enabled", true)) {
                echo '<h1>'.get_theme_mod("pcms_index_title_${part}", "#").'</h1>'; 
                foreach ($sections_partners as $section_partners) {
                    if (get_theme_mod("pcms_index_${part}_${section_partners}_enabled", true)){
                        get_template_part("template-parts/pcms_partners_${section_partners}");
                    }
                }
            }
        }
        echo '</div>';      
    }
?>

<?php get_footer() ?> 