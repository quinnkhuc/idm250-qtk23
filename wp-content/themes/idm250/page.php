<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <main id="page">
        <h1><b id='page-title'><?php the_title(); ?></b></h1>
        <?php the_content(); ?>
    </main>
<?php endwhile; ?>

<?php get_footer(); ?>