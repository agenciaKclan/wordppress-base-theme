<?php get_header(); ?>
<main class="blog">
    <div class="banners">
        <?php
            $args = array('post_type'=>'post', 'showposts'=> 3);
            $my_posts = get_posts( $args );
        ?>
        <?php $cont = 1; if( $my_posts ) : foreach( $my_posts as $post ) : setup_postdata( $post ); ?>
            <div class="banners__post banners__post--<?php echo $cont ?>">
                <?php $image = get_bloginfo('template_url').'/images/noimg.png';
                if ( has_post_thumbnail() ) { ?>
                    <div class="banners__img">
                        <?php echo the_post_thumbnail(); ?>
                    </div>
                    <div class="banners__content">
                        <div class="container">
                        <?php } else { ?>
                            <div class="banners__img banners__img--none">
                                <!-- <img src="https://fakeimg.pl/416x260/" alt=""> -->
                                <img src="<?php echo $image ?>" alt="">
                            </div>
                    <div class="banners__content banners__content--noImg">
                        <div class="container">
                        <?php } ?>
                            <div class="banners__wrapper">
                                <h2><?php the_title(); ?></h2>
                                <p><?php
                                    $excerpt = get_the_excerpt(); 
            
                                    $excerpt = substr( $excerpt, 0, 150 );
                                    echo $excerpt, ' ...' ?></p>

                                <a href="<?php the_permalink(); ?>" class="banners__customBotao">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAABmJLR0QA/wD/AP+gvaeTAAAI9klEQVR4nO2d/Y8dVRnHv1Pb0iKFYv0RCq2yJRiBiG/RRaEsEhL5AY2SAq0tkUQtaowxaTQxviElGgj8YCQUCm2IBDX+A/WV8BY0Ws1CdyktpaEagW2XvtB9YT/+cGbb2Wfm7p1778w5M9f5JDd37+aec74zz53znDnznOdIDQ0NDQ0N3RGFFtAOYImkiyUNSFoT/71a0rvj17nxuyQdl3Q4fj8mab+kPZJGJI1K2hNF0Umf+julcgYBFkq6TNJQ/BqUtKSg6qcl7Za0K349GUXRREF19w/AAmAI2AEcxR9HgUeBa4AFoc9DcICVwFbgoEcjtOIgcBewMuQ5CdJlARdJ2iJpvaRFOYrskzSs075gRNKYnK84IucvJOksScvlfMoKOb8zIOd3LpHzPe2YlLRT0tYoivbmO6KaAqwGfgVMt/m1vgpsB9YD5xXY/nnABuAR2l+V08BjwKqi2q8MwCLgm8CxeU7AOM6HDAFerlzgCuA+4I15dJ0AfgCc4UNT6QCfAUbnOeDh+Fe7NKDGpbGG4Xl0jgBDoTT2DLAw/mW90+IA/xGfhHeF1joLEAE3AM+10DyDu6IWh9baEcCF8xzUa8BNoTW2A1gXa83iGeCC0BpzAVwPHM44iCngHmBZaI15Ac4G7o21W8aA60JrnJe4C5rMED8KfCi0vm7BOf+XMo5rErg1tL5MgG+Q7S9+CywPra9XgGW4IbtlBvhOaH1zAH7Soov6amhtRQNsbtGF/Ti0NkkScEeGuJPA50JrKwvcSOx4xnF/O7SwWzK6qcPAYFBhHgA+Brye0X1tDCXoetIOfAy4NIigAACXxsecZBLfoy/cLO2bRsiJ/4crwxJfKXZKaAy40JeARcDTRsA0cKMXARUE+CxpR/8cPu7ocTd3lr4bTXUK2YObn5Xd6LU4x5Xk8VIbrRHAr825mQGuKauxM4A9psGXgLNLabCG4G4eR8w5GqWMqXvg+6ahKWo8HVIWwEdIP4D7btGNrMaNopLcU2gj+XTkedwbHNwUfZLjFDnqIj2H8xqeZ22B23FRIoeBm3223SnAOcC/zTnbWVTlAxmXoNfnGTj/lbxC3wFu86mhU3CzGLaLf18RFT9kKv5rAXo71bAIeMvoqLRRcE8f/240P9hrpStJT48EmTTERaDYebOqG+ULRu8EcH4vFW41FQ4TMMIPuK1ORsFFZL5o9P60l8ps7NKGgjV3o6tuRtlotB7o6keNuytPMg6cWYLmjgE2ZRhlBvhKaG0WXIjREaN1bTcV7TCV9OaQCqZmRtludG7vtILFpKPQP1WS3q6hJt0XsDajt8l/kwtcaSp4FU/hnZ1SB6Pg/LGN8fpk1ndbORc7Q7kriiKKlVkMURQ9LOnLkmYS/14gaVtVuq8oimYk/d78++rcFQB/NtZcX6jCEqDiPiXWl8QaqGXBpbiokSSFLQkokyp3X7ib7CRv49ZPti14uSn4sge9hVFxo+w3ulIBIVk+ZI35PFyOvHKouE95wXwesF/IY5CRwuR4Ioqi7UobJZL0i8BGsefSnuv+NIhUWaO0NUgK4CnTz326HG1+qJJPAa42Op7MU+hfptAHPGgtFSoyJMZFOibZnafQK6ZQPVYKtaEKRgFWmfb35SlkV6Su8KDVC7Tuvrw8owdWmLZfz1NowhSq1wLHNrQwypt4mKvDxQYkSSXCafJ7OCo5Tyep6bJKbr+rLqtx6uVp6MqpN8Pe8nS0HfYuzCg3bj6/txx5fsDdAD6ouf5yRtLt8byXT2z3/5b9QpZTP2A+X1SYHM8Am5Q2BpI2BzCGlJ5M3G+/kGWQzudbKkhsjG1KG+NrURT9Moyq9vOEfWmQihpD6mbiFrjMOJ7mAVVx2uwDqg/mKbSE9CPc7uNRPVJxY1xgdL1N3pVVwJ9M4eAhpO2gIkPbVsQ/liSZQQ6tpk7+aD7nD1kJANX1GUnsOfxD7pLAoLHmQZpAua7BBcodMho/0UkFi0kvkKnck8M6GEOScImak3QWShpX8qipZFtJeruCivuMJLi0tEke6qaSoQyrNssROgQ4M6O3uaqbipoFOwVAUQt24sruMpU1S9o6gOwlbXf2UuH5pB/pfr5AzZ1oublOxpAk4ItG70l6jZMGtplK/4bnITBuibF9kll1Y0S4ZNFJHiii4veTThywrgDNnWiImJtOr9LGkE4t404yBeTZnSFX5Y+Zyg/hOQsQcGNslP/6/kF0Ci61xn/MOdtRZAOrSCefubewBvoM4H5zro5R9EYxwPcyLsErCm2kDwA+mtHFbymjocWkh3B7gXMKb6ymAMuBl805GqGsvUdwd+82xd8TpTRWQ4DfmHMzA5Q7Uw78nDSbS220BuBy31vu9tHwQtJrSKbp49Ti7cClHrdpYp/FVwY83B28vVE7AVzpRUCFAD5OOg+8v0TKCSHX0aQaz0o1PgFcG0rQOrKT8ff9lULrZPxfCi1sM2lOEmgS0gc4n2FvlAG+FVqbJAn4UYa4KeCO0NqKBjeaytoY84ehtc0B+HpG9wXwO+Dc0Pp6BbdB2OMZx1e9LY9mAW4le1OwvcCHQ+vrFtx0iL0DB+fAK51DeHb0ZfcWIb7M76NGUy24Wdv7W3RRbxBqNNUpuLDJZzIOAlzG51uoaJyXdOr5y3rS2alneYqahNeegvZbr/6T6m29ugA3gnq+hebZrVdrkYM+E1yQmN3mIsmLuMiMYCFGuFCdTaRns5O8QNkThb7g9PbdNrFmkhPAE/EvtPSrJr4aBoEHSMdNJTlOP23fnQS3afFOsjdmTHIIl6Z2IwU+acP5tk2xBhtra5mKNRT7pK8NQRwrbpeALZI2SMqTKeIVueRfe+RWHY1KGpN0TNKR+F2SzpK0PH5/j9yKpQFJF0u6RFKeCb9JSY9IujuKovbLlvsJ3Kzxnbg0tKE5gNNSi/ySpYLrz9figpLHPRphHHgYuIqAEZlJKncvgHPol0sail+Dktpn78zHtKTdknbFr79EUTRZUN2FUDmDWHCjmzWa6w9WyfmJZTrtM6TTPuVo/Pc+OZ8z63dGoiia8Km/oaGhoaHBF/8DuA7kqBrtYYoAAAAASUVORK5CYII=" alt="">Leia mais
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
        <?php $cont ++; endforeach; endif;?>
    </div>
    <div class="container">
    <?php
        if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '</p><p id="breadcrumbs">','</p><p>' );
        }
    ?>
        <div class="posts__content">
            <div class="posts__boxLeft">
                <h2 class="posts__init">Posts</h2>
                <div class="box-liste-posts">
                    <?php
                        $args = array('post_type'=>'post', 'showposts'=> 30);
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
            <div class="posts__boxRight">
                <div class="posts__title">
                    <?php dynamic_sidebar('primary-sidebar') ?>
                </div>
            </div>
        </div>
    </div>
</main>
<!--
<div class="clear"></div>

<div class="galeria">
    <div class="wrap">
        <?php /*
                $args = array('post_type'=>'page', 'pagename'=>'galeria');
                $my_page = get_( $args );
        ?>
        <?php $cont = 1; if( $my_page ) : foreach( $my_page as $post ) : setup_postdata( $post ); ?>

            <?php the_content(); ?>

            <?php $images = easy_image_gallery_get_image_ids(); ?>
            <?php if($images) : foreach ($images as $attachment_id ):?>
            <?php $imagesfull = wp_get_attachment_image_src ($attachment_id, '' ); ?>
            <?php $image = wp_get_attachment_image_src ($attachment_id, 'thumb-custom' ); ?>

                <a class="popup" rel="fancybox[group]" href="<?php echo $imagefull[0]; ?>">

                    <img src="<?php echo $image[0]; ?>">

                </a>

            <?php endforeach; endif;?>

        <?php $cont ++; endforeach; endif; */?>
    </div>
</div> -->
<?php get_footer(); ?>