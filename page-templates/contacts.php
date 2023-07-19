<?php
/*
 * Template Name: Contacts Template
 */
get_header();
?>

<h1><?= get_the_title();?>.</h1>
<section class="my-5">
    <div class="row my-5">
        <div class="col text-left">
            <p class="main-text">
                <?= nl2br(esc_html(get_theme_mod("pcms_contacts_description", "A desire for a big big party or a very select congress? Contact us.")));?>
            </p>
        </div>
    </div>
    <div class="row flex-column flex-lg-row gap-4 justify-content-lg-end my-5">
        <div class="col col-lg-3 d-flex flex-column gap-2 align-items-lg-end">
            <h4 class="text-lg-end"><?=get_theme_mod("pcms_contacts_location_title", "Location");?></h4>
            <p class="text-lg-end">
                <?= nl2br(esc_html(get_theme_mod("pcms_contacts_location_description", "242 Rue du Faubourg Saint-Antoine<br>75020 Paris<br>FRANCE.")));?>
            </p>
        </div>
        <div class="col col-lg-3 d-flex flex-column gap-1 align-items-lg-end">
            <h4 class="text-lg-end"><?=get_theme_mod("pcms_contacts_location_info", "Phone / Email");?></h4>
            <?php 
                $tel = get_theme_mod("pcms_contacts_location_info_phone", "01 64 98 26 34");
                $telLink = str_replace(' ', '', $tel);
                $telLink = substr($telLink, 1);
                $telLink = '+33' . $telLink;
            ?>
            <a class="main-text text-lg-end" href="tel:<?=$telLink?>"><?=$tel;?></a>
            <?php $email = get_theme_mod("pcms_contacts_location_info_mail", "contact@pcms.fr");?>
            <a class="main-text text-lg-end" href="mailto:<?=$email?>"><?=$email;?></a>
        </div>
    </div>
</section>

<?php if (!the_content() == null) :?>
<section class="my-5">
    <?php the_content();?>
</section>
<?php endif; ?>
<?php get_footer();