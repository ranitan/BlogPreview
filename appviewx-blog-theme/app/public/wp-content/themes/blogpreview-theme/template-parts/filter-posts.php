<?php
/* Template Name: Product Filter Page */
get_header();
?>

<div class="container">
    <h1 class="page-title"><?php the_title(); ?></h1>

    <!-- Call the shortcode -->
    <?php echo do_shortcode('[product_filter]'); ?>

</div>

<?php get_footer(); ?>
