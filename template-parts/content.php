<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>

    <article class="card mb-3">
        <div class="row no-gutters">
            <div class="col-8">
                <div class="card-body">
                    <?php 
                    $categories = get_the_category($post->ID);
                    if ( ! empty( $categories ) ) {
                        echo '<strong class="d-inline-block mb-2 text-primary">'. esc_html( $categories[0]->name ) .'</strong>';
                    }
                    ?>
                    <h3 class="card-title text-truncate mb-0" itemprop="name headline"><?php echo get_the_title($post->ID); ?></h3>
                    <p class="card-text mb-1" itemprop="datePublished"><small class="text-muted"><?php echo get_the_date('F Y',$post->ID); ?></small></p>
                    <p class="card-text"><?php echo starter_get_the_excerpt(100,$post->ID); ?></p>
                    <a class="card-link" href="<?php echo get_permalink($post->ID); ?>" rel="bookmark" itemprop="url">Readmore</a>
                </div>
            </div>
            <div class="col-4 blog-card-img" style="background-size: cover;background-repeat: no-repeat;background-position: center;background-image:url(<?php echo get_the_post_thumbnail_url($post->ID); ?>);"></div>
        </div>
    </article>
