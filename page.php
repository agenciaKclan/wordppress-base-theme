<?php
    get_header(); ?>
    <main class="page">
        <div class="container">
            <h2><?php the_title(); ?></h2>
            <p><?php the_excerpt(); ?></p>
        </div>
    </main>
<?php
    get_footer();
?>