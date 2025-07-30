<?php get_header(); ?>

<main class="main-content">
    <!-- Blog Slider Section -->
    <section class="blog-slider-section">
        <div class="container">
            <?php get_template_part('template-parts/blog-slider'); ?>
        </div>
    </section>
    
    <!-- Latest Blog Posts Section -->
    <section class="blog-posts-section">
        <div class="container">
            <h1 class="section-title">Latest Blog Posts</h1>
            <div class="blog-posts-grid" id="posts-container">
        <?php

        $latest_posts = new WP_Query(array(
            'posts_per_page' => 5,
            'post_status' => 'publish',
            'paged' => 1
        ));

        if ($latest_posts->have_posts()) :
            while ($latest_posts->have_posts()) : $latest_posts->the_post();
                get_template_part('template-parts/post-card');
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No posts found.</p>';
        endif;
        ?>
    </div>

    <div class="load-more-wrap" style="text-align:center; margin-top:30px;">
        <button id="load-more-posts" data-page="1" class="btn-load-more">Load More</button>
    </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>