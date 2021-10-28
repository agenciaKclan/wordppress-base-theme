<?php
    get_header(); ?>
    <main class="category">
        <div class="container">
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '</p><p id="breadcrumbs">','</p><p>' );
            }
        ?>
            <div class="posts__content">
                <div class="posts__boxLeft">
                    <?php
                    $current_cat_id  = get_query_var('cat');
                    $showposts = 10;
                    $args = array(
                        'cat' => $current_cat_id, 
                        'orderby' => 'post_date', 
                        'order' => 'DESC', 
                        'posts_per_page' => $showposts,
                        'post_status' => 'publish'
                    );
                    query_posts($args);?>
                    <div class="posts__list">
                        <?php
                        if (have_posts()) {
                            $cont = 0; 
                            $image = get_bloginfo('template_url').'/images/noimg.png';
                            while (have_posts()) {
                                $cont ++;
                                the_post();
                                ?>
                                <div class="liste-posts-content liste-posts-content--<?php echo $cont ?>">
                                    <div class="box-text">
                                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                                    <p><?php the_date(); ?></p>
                                    <p><?php the_author(); ?></p>
                                    </div>
                                    <?php 
                                    if ( has_post_thumbnail() ) { ?>
                                        <div class="box-img">
                                        <a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail(); ?></a>
                                        </div>
                                    <?php 
                                    } else { ?>
                                        <div class="box-img box-img--none">
                                            <!-- <img src="https://fakeimg.pl/416x260/" alt=""> -->
                                            <a href="<?php the_permalink(); ?>"><img src="<?php echo $image ?>" alt=""></a>
                                        </div>
                                    <?php
                                    } ?>
                                </div>      
                            <?php 
                            }
                        }
                        else {
                            _e('No Posts Sorry.');
                        } ?>
                            </div>
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