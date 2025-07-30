<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="<?php echo home_url(); ?>" class="site-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/coffeeslogo.png" alt="<?php bloginfo('name'); ?>">
                    </a>


                </div>
                 <!-- menu navigation -->
                <nav class="main-navigation">
                    <button class="mobile-menu-toggle" aria-label="Toggle menu">
                        <!-- span to show the 3 line menu in the mobile -->
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <!-- Primary Menu -->
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'nav-menu',
                        'container' => false,
                        'fallback_cb' => false
                    ));
                    ?>
                    <!-- Dark Mode Toggle -->
                    <button class="dark-mode-toggle" id="darkModeToggle" aria-label="Toggle dark mode">
                        <span class="sun-icon">☀️</span>
                        <span class="moon-icon">🌙</span>
                    </button>
                </nav>
            </div>
        </div>
    </header>