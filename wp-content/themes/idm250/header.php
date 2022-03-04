<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <link rel="icon" type="image/x-icon" href="http://quynhthikhuc.com/idm250/wp-content/uploads/2022/03/site_favicon.png">
    <?php wp_head(); ?>
</head>
<body <?php body_class()?>>
    <header>
        <a id="logo" href="<?php echo get_home_url(); ?>"> <?php echo get_bloginfo( 'name' ); ?> </a>
        <?php
            wp_nav_menu(['theme_location' => 'primary_menu']);
        ?>
    </header>