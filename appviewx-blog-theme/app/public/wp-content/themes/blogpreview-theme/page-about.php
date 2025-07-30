<?php get_header(); ?>

<main class="main-content">
    <section class="about-section">
        <div class="container">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="about-content">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                        <div class="page-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
