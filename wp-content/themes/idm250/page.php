<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <main id="page">
        <div id="post-header">
            <?php the_post_thumbnail(); ?>
            <div id="meta">
                <h1><b id='page-title'><?php the_title(); ?></b></h1>
                <p>By <?php the_author(); ?><br>Published on <?php the_date( 'Y-m-d' ); ?></p>
            </div>
        </div>
        <?php the_content(); ?>
    </main>
<?php endwhile; ?>

<?php get_footer(); ?>