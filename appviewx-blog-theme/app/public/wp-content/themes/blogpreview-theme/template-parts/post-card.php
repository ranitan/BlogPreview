<article class="post-card">
    <div class="post-thumbnail">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('blog-thumbnail'); ?>
            </a>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>" class="default-thumbnail">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-post.jpg" alt="<?php the_title(); ?>">
            </a>
        <?php endif; ?>
    </div>


    <div class="post-content">
                <h3 class="post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="post-meta">
            <span class="post-date">
                <i class="fas fa-calendar"></i>
                <?php echo get_the_date(); ?>
            </span>

            <span class="post-category">
                <i class="fas fa-folder"></i>
                <?php
                $categories = get_the_category();
                if (!empty($categories)) {
                    echo $categories[0]->name;
                }
                ?>
            </span>
        </div>

        <div class="post-excerpt">
            <?php echo wp_trim_words(get_the_content(), 20, '...'); ?>
        </div>


        <a href="<?php the_permalink(); ?>" class="read-more">
            Read More <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</article>