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
                </div>
                <div class="posts__boxRight">
                    <div class="posts__title">
                        <?php dynamic_sidebar('primary-sidebar') ?>
                    </div>
                </div>
            </div>

        <?php

        $argsCategory = array(
            'orderby'                  => 'name',
            'order'                    => 'ASC',
            'parent'                   => 0,
            'hide_empty'               => 0,
            'exclude'                  => '1' 

        );?>
        <?php 
        $categories = get_categories($argsCategory);
        foreach($categories as $category) : 
        $term_id = $category->term_id; 

        $sub_categories =  get_categories('child_of='.$term_id.'&hide_empty=0');

        foreach($sub_categories as $category) : ?>

        <div class="cursos-accordion">
            <button class="accordion"><?php echo  $category->name; ?></button>
            <div class="panel">

            <?php
                $subcat_posts = get_posts('cat=' . $category->term_id);
                foreach($subcat_posts as $subcat_post) :
                    $postID = $subcat_post->ID; ?>
                    <p><a href="<?php echo get_permalink($postID); ?>"><?php echo get_the_title($postID);?> </a></p>

                <?php endforeach; ?>

            </div>
        </div>

        <?php endforeach; ?>

        <?php endforeach; ?>
        </div>
    </main>
<?php
    get_footer();
?>