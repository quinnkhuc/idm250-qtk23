<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <main class='single'>
        <h1><b class='page-title'><?php the_title(); ?></b></h1>
        <div class='project-content'>
            <?php the_content(); ?>
        </div>
    </main>
<?php endwhile; ?>

<?php get_footer(); ?>