<?php

// will display latest 3 posts
$latest_posts = new WP_Query([
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC'
]);

if ($latest_posts->have_posts()) :
?>
    <div class="blog-slider">
        <div class="slider-container">
            <?php while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                <div class="slide">
                    <div class="slide-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="slide-image">
                                <?php the_post_thumbnail('slider-image'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="slide-content">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="slider-controls">
            <button class="prev-slide" aria-label="Previous slide">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="next-slide" aria-label="Next slide">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <div class="slider-dots">
            <?php for ($i = 0; $i < $latest_posts->post_count; $i++) : ?>
                <button class="dot <?php echo $i === 0 ? 'active' : ''; ?>" data-slide="<?php echo $i; ?>"></button>
            <?php endfor; ?>
        </div>
    </div>
<?php
    wp_reset_postdata();
endif;
?>