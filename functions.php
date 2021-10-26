<?php
    add_action('after_setup_theme', 'my_theme_setup');
    function my_theme_setup() {

        add_theme_support('post-thumbnails'); 

        add_theme_support('title-tag');
        
        register_nav_menus(
            array(
                'primary' => 'Primary'
            )
        );
    }

    add_action('wp_enqueue_scripts', 'my_theme_scripts');
    function my_theme_scripts() : void {

        wp_enqueue_style('slick-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), null, false);
        
        wp_enqueue_style('slick-theme-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css' , array(), null, false);
        
        wp_enqueue_style('kcl-style', get_template_directory_uri() . '/kcl-style.min.css', array(), null, false);
        
        wp_enqueue_script('cdn-jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), null, true);
        
        wp_enqueue_script('slick-script', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), null, true);
        
        wp_enqueue_script('kcl-script', get_template_directory_uri() . '/index.min.js', array(), null, true);

        add_filter( 'script_loader_tag', __NAMESPACE__ . '\wpdocs_my_add_sri', 10, 2 );
    }
    function wpdocs_my_add_sri( $html, $handle ) : string {
        switch( $handle ) {
            case 'cdn-jquery':
                $html = str_replace( '></script>', ' integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>', $html );
                break;
        } 
        return $html;
    }
    
    add_action('widgets_init', 'my_theme_sidebars');
    function my_theme_sidebars() {

        register_sidebar(array(
            'id' => 'primary-sidebar',
            'name' => 'Primary Sidebar',
            'description' => 'Sidebar that appears across the entire website',
            'before_widget' => '<div id="%1$s" class="widget %2$s" >',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        ));
        
    }

?>
