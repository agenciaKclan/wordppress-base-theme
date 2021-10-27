<?php
    get_header(); ?>
    <main class="page">
        <div class="container">
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '</p><p id="breadcrumbs">','</p><p>' );
                }
            ?>
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