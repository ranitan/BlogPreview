<?php
/*
Template Name: My Blogs Page
*/
get_header(); ?>

<main class="main-content">
    <!-- Blog Posts Section -->
    <section class="blog-posts-section">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
            
            <div class="blog-posts-grid" id="posts-container">
            <?php
            $all_posts = new WP_Query(array(
                'posts_per_page' => -1, 
                'post_status' => 'publish',
            ));

            if ($all_posts->have_posts()) :
                while ($all_posts->have_posts()) : $all_posts->the_post();
                    get_template_part('template-parts/post-card');
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No posts found.</p>';
            endif;
            ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>