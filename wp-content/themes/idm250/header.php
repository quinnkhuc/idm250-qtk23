<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <h1 id="logo"> <?php echo get_bloginfo( 'name' ); ?> </h1>
        <?php
            wp_nav_menu(['theme_location' => 'primary_menu']);
        ?>
    </header>