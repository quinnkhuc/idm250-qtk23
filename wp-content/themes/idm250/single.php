<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <main id='single'>
        <h1><b id='page-title'><?php the_title(); ?></b></h1>
        <div class='content'>
            <?php the_content(); ?>
        </div>
    </main>
<?php endwhile; ?>

<?php get_footer(); ?>