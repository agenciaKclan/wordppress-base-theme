<?php
    get_header(); ?>
    <main class="page">
        <div class="container">
            <div class="posts__content">
                <div class="posts__boxLeft">
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_excerpt(); ?></p>
                </div>
                <div class="posts__boxRight">
                    <div class="posts__title">
                        <?php dynamic_sidebar('primary-sidebar') ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
    get_footer();
?>