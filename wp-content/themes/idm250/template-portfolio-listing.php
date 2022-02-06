<?php /* Template Name: Portfolio Listing */ ?>

<?php get_header(); ?>

<main id="portfolio-main">
    <h1>PORTFOLIO</h1>
    <div class='portfolio-projects-wrapper'>
        <?php
            include __DIR__ .'/components/project-listing.php';
        ?>
        <?php
            include __DIR__ .'/components/project-listing.php';
        ?>
    </div>  
</main>

<?php get_footer(); ?>