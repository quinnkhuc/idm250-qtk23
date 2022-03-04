<?php /* Template Name: Portfolio Listing */ ?>

<?php get_header(); ?>

<main id="listing-main">
    <h1><b id='page-title'><?php the_title(); ?></b></h1>
    <?php get_template_part('components/recent-works');  ?>
</main>

<?php get_footer(); ?>