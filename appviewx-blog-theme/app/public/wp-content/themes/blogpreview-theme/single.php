<?php get_header(); ?>

<main class="single-post">
    <div class="container">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <article class="post-full">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    
                    <div class="post-meta">
                        <span class="post-date">
                            <i class="fas fa-calendar"></i> 
                            <?php echo get_the_date('F j, Y'); ?>
                        </span>
                        <span class="post-category">
                            <i class="fas fa-folder"></i> 
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) {
                                echo esc_html($categories[0]->name);
                            }
                            ?>
                        </span>
                        <?php if (get_the_author()) : ?>
                        <span class="post-author">
                            <i class="fas fa-user"></i> 
                            <?php echo get_the_author(); ?>
                        </span>
                        <?php endif; ?>
                    </div>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>

                    <!-- Post Navigation -->
                    <div class="post-navigation">
                        <?php
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();
                        ?>
                        
                        <?php if ($prev_post || $next_post) : ?>
                        <div class="nav-links">
                            <?php if ($prev_post) : ?>
                            <div class="nav-previous">
                                <a href="<?php echo get_permalink($prev_post->ID); ?>">
                                    <i class="fas fa-arrow-left"></i>
                                    <span>Previous Post</span>
                                    <strong><?php echo get_the_title($prev_post->ID); ?></strong>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if ($next_post) : ?>
                            <div class="nav-next">
                                <a href="<?php echo get_permalink($next_post->ID); ?>">
                                    <span>Next Post</span>
                                    <strong><?php echo get_the_title($next_post->ID); ?></strong>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Back to Blog -->
                    <div class="back-to-blog">
                        <a href="<?php echo home_url('/my-blogs/'); ?>" class="btn-back">
                            <i class="fas fa-arrow-left"></i> Back to All Posts
                        </a>
                    </div>
                </article>
            <?php endwhile;
        else :
            echo '<p>No post found.</p>';
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>