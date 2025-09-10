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


// ==============================
// Register CPT: Product Filter
// ==============================
function blog_preview_register_product_filter_cpt() {
    $labels = array(
        'name'               => 'Products',
        'singular_name'      => 'Product',
        'menu_name'          => 'Products',
        'add_new_item'       => 'Add New Product',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
    );

    register_taxonomy(
        'product_category', // taxonomy slug
        'product_filter',   // post type
        array(
            'label'        => __( 'Product Categories' ),
            'rewrite'      => array( 'slug' => 'product-category' ),
            'hierarchical' => true, // behaves like categories ....this shows the option for parent
        )
    );

    register_post_type('product_filter', $args);
}
add_action('init', 'blog_preview_register_product_filter_cpt');


// ==============================
// Shortcode: Product Filter (with template part)
// ==============================
function blog_preview_product_filter_shortcode() {
    ob_start();

    // Get categories for CPT product_filter
    $categories = get_terms(array(
        'taxonomy'   => 'product_category',
        'hide_empty' => true,
    ));


    // Query CPT posts
    $products = new WP_Query(array(
        'post_type'      => 'product_filter',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ));
    ?>

    <div class="product-filter-wrapper">
        <!-- Filter Buttons -->
        <div class="product-filter-buttons">
            <button class="filter-btn active" data-cat="all">All</button>
            <?php foreach ($categories as $cat) : ?>
                <button class="filter-btn" data-cat="cat-<?php echo esc_attr($cat->term_id); ?>">
                    <?php echo esc_html($cat->name); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Product Grid -->
        <div class="product-grid">
            <?php if ($products->have_posts()) : ?>
                <?php while ($products->have_posts()) : $products->the_post(); ?>
                    <?php
                    $terms = wp_get_post_terms(get_the_ID(), 'product_category');
                    $cat_classes = '';
                    foreach ($terms as $t) {
                        $cat_classes .= ' cat-' . $t->term_id;
                    }
                    ?>
                    <div class="product-card<?php echo esc_attr($cat_classes); ?>">
                        <?php  get_template_part('template-parts/post-card'); ?>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <p>No products found.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('product_filter', 'blog_preview_product_filter_shortcode');

?>