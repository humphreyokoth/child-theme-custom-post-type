<?php
/*
Template Name: Alumni Register
*/
get_header();
?>

<div class="main-content">
    <?php the_content(); ?>
    <?php echo do_shortcode('[wpforms id="331" title="false"]'); ?>
</div>

<?php get_footer(); ?>
