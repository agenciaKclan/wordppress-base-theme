<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <!-- KCL styll -->
    <?php wp_head(); ?>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="header__wrapper">
                <h2><a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h2>
                <?php
                    wp_nav_menu(array('theme_location' => 'primary'));
                ?>
            </div>
            <!-- <h2><?php  /* bloginfo('description'); ?></h2> -->
            <div class="infor">
                <?php
                    $args = array('post_type' => 'page', 'pagename' =>'sobre');
                    $my_page = get_posts ( $args);
                ?>
                <?php if($my_page) : foreach( $my_page as $post ) : setup_postdata( $post); ?>

                    <h2><?php the_title(); ?></h2>
                    <?php the_excerpt(); ?>
                    
                    <a href="<?php the_permalink(); ?>" class="custom-botao">Leia mais</a>
                <?php endforeach; ?>

                <?php else: ?>
                    <p>Nenhum conteudo inserido na pagina sobre</p>
                <?php endif ?>

            </div>
            <!-- <div class="procura"><?php 
                get_search_form(
                    array(
                        'aria_label' => __( 'Search for:' ),
                    )
                );
                ?>
                <?php the_category( ' ' ); ?>
                <?php the_title( '<h1 class="tituloPost">', '</h1>' ); */ ?>
            </div> -->
        </div>
    </div>
