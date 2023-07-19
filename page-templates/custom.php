<?php
/*
 * Template Name: Custom Template
 */
?>

<?php get_header();?>
<h1><?= ucfirst(get_the_title());?>.</h1>
<br>
<?php the_content();?>

<?php get_footer();?>