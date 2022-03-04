<?php get_header(); ?>

<main id='home-main'>
    <?php the_content(); ?>
    <?php get_template_part('components/recent-works'); ?>
</main>

<?php get_footer(); ?>