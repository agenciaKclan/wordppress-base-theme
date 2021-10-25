<?php
    get_header(); ?>
    <main class="page">
        <div class="container">
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