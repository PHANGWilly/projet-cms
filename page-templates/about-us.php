<?php
/*
 * Template Name: About Us Template
 */
?>

<?php get_header();?>

<h1><?= get_the_title();?>.</h1>

<?= get_template_part('template-parts/pcms_aus_section-1'); ?>
<?= get_template_part('template-parts/pcms_aus_section-2'); ?>
<?= get_template_part('template-parts/pcms_aus_section-3'); ?>

<?php get_footer();