<?php /* Template Name: Search Results */ ?>

<?php get_header(); ?>

<?php
 $args = [
     's' => $_GET['s'],
     'post_type' => $_GET['post_type'],
 ];
 $search_query = new WP_Query($args)
?>

<main id="search-main">
    <div class="container search-results">
        <?php
        if ($search_query->have_posts()) {
            while ($search_query->have_posts()) : $search_query->the_post();
                get_template_part('components/project-teaser');
            endwhile;

            wp_reset_postdata();
        } else {
            echo '<p>Sorry, there are no results</p>';
        }

        ?>
    </div>
</main>

<?php get_footer(); ?>