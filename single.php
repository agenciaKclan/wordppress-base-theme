<?php get_header();?>
<?php while ( have_posts() ) : the_post(); ?>
<main class="post">
	<div class="container">
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '</p><p id="breadcrumbs">','</p><p>' );
            }
        ?>
		<div class="clear"></div>
		<div class="main">
            <div class="posts__content">
                <div class="posts__boxLeft">
                    <div class="post__content">
                        <h1 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>
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
                            <div class="content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="comentarios">
                        <?php the_comment(''); ?>
                    </div>
                </div>
                <div class="posts__boxRight">
                    <div class="posts__title">
                        <?php dynamic_sidebar('primary-sidebar') ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
</main>
<?php endwhile; ?>
<?php get_footer();?>