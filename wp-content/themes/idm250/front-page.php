<?php get_header(); ?>

<main id='home-main'>
    <div id='introduction'>
        <h1>Hi, I'm <b id='fname'>Quinn</b></h1>
        <p>I'm a problem solver, creative thinker, and aspiring UX Designer.</p>
    </div>
    <div id='home-projects'>
        <h2>My work</h2>
        <div class='portfolio-projects-wrapper'>
            <?php
                include __DIR__ .'/components/project-listing.php';
            ?>
            <?php
                include __DIR__ .'/components/project-listing.php';
            ?>
        </div>    
    </div>
</main>
<?php get_footer(); ?>