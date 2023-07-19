<?php
/*
 * Template Name: Services Template
 */
?>

<?= get_header(); ?>

<h1><?= get_the_title();?>.</h1>

<?= get_template_part('template-parts/pcms_services_section-1'); ?>
<?= get_template_part('template-parts/pcms_services_section-2'); ?>

<?php get_footer();
