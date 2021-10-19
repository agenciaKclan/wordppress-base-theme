<?php get_header(); ?>
<div class="blog">
    <div class="container">
        <h2>Blog</h2>
        <div class="box-liste-posts">
            <?php 
                $args = array('post_type'=>'post', 'showposts'=> 10);
                $my_posts = get_posts( $args );
            ?>
            <?php $cont = 1; if( $my_posts ) : foreach( $my_posts as $post ) : setup_postdata( $post ); ?>
                <div class="liste-posts-content liste-posts-content--<?php echo $cont ?>">
                    <?php $image = get_bloginfo('template_url').'/images/noimg.png';
                    if ( has_post_thumbnail() ) { ?>
                        <div class="box-img">
                            <?php echo the_post_thumbnail(); ?>
                        </div>
                        <div class="box-content-post">
                        <?php } else { ?>
                            <div class="box-img box-img--none">
                                <!-- <img src="https://fakeimg.pl/416x260/" alt=""> -->
                                <img src="<?php echo $image ?>" alt="">
                            </div>
                            <div class="box-content-post box-content-post--noImg">
                        <?php } ?>
                        <div class="box-content-post__wrapper">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="custom-botao">Leia mais</a>
                        </div>
                    </div>
                </div>
            <?php $cont ++; endforeach; endif;?>
        </div>
    </div>
</div>

<?php get_footer(); ?>