<?php get_header();?>
<main class="search">
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
                    <?php
                    $s=get_search_query();
                    $args = array(
                                    's' =>$s
                                );
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ) {
                        _e("<h2> Resutados da pesquisa por: '".get_query_var('s')."'</h2>");
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>
                            <?php if ( has_post_thumbnail() ) { ?>
                                <div class="box-img">
                                <a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail(); ?></a>
                                </div>
                            <?php } else { ?>
                                <div class="box-img box-img--none">
                                    <!-- <img src="https://fakeimg.pl/416x260/" alt=""> -->
                                    <img src="<?php echo $image ?>" alt="">
                                </div>
                            <?php }
                        }
                    }
                    else { ?>
                        <h2>Nada encontrado</h2>
                        <div class="alert alert-info">
                            <p>Nada foi encontrado com os criterios utilizados</p>
                        </div>
                    <?php } ?>
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
<?php get_footer();?>