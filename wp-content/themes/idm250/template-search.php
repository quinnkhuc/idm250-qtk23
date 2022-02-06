<?php /* Template Name: Search */ ?>

<?php get_header(); ?>

<main id="search-main">
   <h1>Search result for 'project'</h1>
   <div id="search-results-wrapper">
        <?php
            include __DIR__ .'/components/search-result.php';
        ?>
        <?php
            include __DIR__ .'/components/search-result.php';
        ?>
   </div>
</main>

<?php get_footer(); ?>