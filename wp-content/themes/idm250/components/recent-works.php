
<?php
// https://developer.wordpress.org/reference/classes/wp_query/
$arg = [
    'post_type' => 'idm-projects',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'order' => 'DESC'
];
$project_query = new WP_Query($arg);

?>

<section id="projects">
    <?php if(get_the_title() != "Portfolio") {
        echo "<h2>My Works</h2>";
    } ?>
  <div id="projects-wrapper">
    <?php
    while ($project_query->have_posts()) : $project_query->the_post(); ?>
    <?php
    // Has to be done in the loop so we have access to the featured image ID
    $featured_image = idm_get_asset_by_id(get_post_thumbnail_id());

    if (!$featured_image) {
        $featured_image['alt'] = 'Missing Image';
        $featured_image['src'] = '//via.placeholder.com/600x600';
    };
    ?>
    <figure class="project-teaser">
        <img class="project-teaser-image"
             src="<?php echo $featured_image['src']; ?>"
             alt="<?php echo $featured_image['alt']; ?>">
        <figcaption>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </figcaption>
    </figure>
    <?php
    endwhile;
    wp_reset_postdata();
  ?>
  </div>
</section>