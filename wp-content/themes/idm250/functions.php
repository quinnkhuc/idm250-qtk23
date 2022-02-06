<?php
    // Check Server PHP Version
    if (version_compare('7.2.34', phpversion(), '>')) {
        die('You must be using PHP 7.2.34 or greater.');
    }

    // Check WP Version
    if (version_compare($GLOBALS['wp_version'], '5.8.2', '<')) {
        die('WP theme only works in WordPress 5.8.2 or later. Please upgrade your WP site');
    }

    // Include styles
    function include_styles()
    {
        // Example of including an external link
        wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        // Example of including a style local to your theme root
        wp_enqueue_style(
            'reset-css',
            get_template_directory_uri() . '/styles/reset.css'
        );

        wp_enqueue_style(
            'general-css',
            get_template_directory_uri() . '/styles/general.css'
        );

        wp_enqueue_style(
            'header-css',
            get_template_directory_uri() . '/styles/header.css'
        );

        wp_enqueue_style(
            'footer-css',
            get_template_directory_uri() . '/styles/footer.css'
        );

        wp_enqueue_style(
            'home-css',
            get_template_directory_uri() . '/styles/home.css'
        );

        wp_enqueue_style(
            '404-css',
            get_template_directory_uri() . '/styles/404.css'
        );
    }
    add_action('wp_enqueue_scripts', 'include_styles');

    // Include scripts
    function include_js_files()
    {
        wp_enqueue_script(
            'main-js',
            get_template_directory_uri() . '/scripts/main.js',
            [],
            false,
            true
        );
    }
    add_action('wp_enqueue_scripts', 'include_js_files');

    // Register the menus on my site
    function register_theme_navigation()
    {
        register_nav_menus([
            'primary_menu' => 'Primary Menu',
            'footer_menu' => 'Footer Menu',
        ]);
    }
    add_action('after_setup_theme', 'register_theme_navigation');
?>