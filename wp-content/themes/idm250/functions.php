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
            'front-page-css',
            get_template_directory_uri() . '/styles/front-page.css'
        );

        wp_enqueue_style(
            '404-css',
            get_template_directory_uri() . '/styles/404.css'
        );

        wp_enqueue_style(
            'listing-template-css',
            get_template_directory_uri() . '/styles/listing-template.css'
        );

        wp_enqueue_style(
            'search-result-component-css',
            get_template_directory_uri() . '/styles/search-result-component.css'
        );

        wp_enqueue_style(
            'search-template-css',
            get_template_directory_uri() . '/styles/search-template.css'
        );

        wp_enqueue_style(
            'single-css',
            get_template_directory_uri() . '/styles/single.css'
        );

        wp_enqueue_style(
            'page-css',
            get_template_directory_uri() . '/styles/page.css'
        );

        wp_enqueue_style(
            'recent-work-css',
            get_template_directory_uri() . '/styles/recent-work.css'
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

    //Custom post types
    function idm_register_custom_post_type()
    {
        $args = [
            'label' => 'Project',
            'labels' => [
                'name' => 'Projects',
                'singular_name' => 'Project'
            ],
            'supports' => [
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'page-attributes',
                'post-formats'
            ],
            // 'taxonomies'            => ['category', 'post_tag'],
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'show_in_rest' => true,
            // Dash Icons https://developer.wordpress.org/resource/dashicons/#media-audio
            'menu_icon' => 'dashicons-clipboard'
            // 'menu_icon'             => get_stylesheet_directory_uri() . '/static/images/icons/industries.png'
        ];

        register_post_type('idm-projects', $args);
    }
    add_action('init', 'idm_register_custom_post_type');

    //Custom taxonomies
    function idm_register_taxonomies()
    {
        $labels = [
            'name' => _x('Categories', 'taxonomy general name'),
            'singular_name' => _x('Category', 'taxonomy singular name'),
            'search_items' => __('Search Categories'),
            'all_items' => __('All Categories'),
            'parent_item' => __('Parent Category'),
            'parent_item_colon' => __('Parent Category:'),
            'edit_item' => __('Edit Category'),
            'update_item' => __('Update Category'),
            'add_new_item' => __('Add New Category'),
            'new_item_name' => __('New Category Name'),
            'menu_name' => __('Categories'),
        ];

        register_taxonomy(
            'idm-project-categories',
            ['idm-projects'],
            [
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => ['slug' => 'project-categories'],
            ]
        );
    }

    add_action('init', 'idm_register_taxonomies', 0);

    //Helpers
    function idm_get_asset_by_id($attachment_id)
    {
        // If no image, return false
        if (!wp_get_attachment_image_url($attachment_id, '')) {
            return false;
        }
        $attachment = get_post($attachment_id);

        return [
            'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink($attachment->ID),
            'src' => wp_get_attachment_image_url($attachment_id, ''),
            'title' => $attachment->post_title
        ];
    }

?>