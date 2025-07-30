<?php
// display dynamic 
function blog_preview_theme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

}
add_action('after_setup_theme', 'blog_preview_theme_setup');

// Enqueue styles and scripts
function blog_preview_enqueue_assets() {
    // Styles
    wp_enqueue_style('blog-preview-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');

    // Scripts
    wp_enqueue_script('blog-preview-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);

    // Ajax
    wp_localize_script('blog-preview-script', 'loadmore', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'blog_preview_enqueue_assets');


// Ajax Load More
add_action('wp_ajax_load_more_posts', 'load_more_posts_ajax');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts_ajax');

//backend logic
function load_more_posts_ajax() {
    $paged = isset($_POST['page']) ? intval($_POST['page']) + 1 : 2;

    $query = new WP_Query(array(
        'post_status' => 'publish',
        'posts_per_page' => 5,
        'paged' => $paged
    ));

    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/post-card');
        endwhile;
    } else {
        echo 0;
    }

    wp_die();
}
?>