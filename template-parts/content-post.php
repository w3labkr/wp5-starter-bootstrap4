<?php 
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>

    <article <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">

        <header class="entry-header">
            <h2 class="entry-title display-3 text-center font-italic mb-3" itemprop="name headline"><?php echo get_the_title(); ?></h2>
            <p class="entry-meta">
                <time class="entry-time" itemprop="datePublished dateModified" datetime="<?php echo get_the_date(); ?>">
                    <?php echo get_the_date(); ?>
                </time> 
                <span>by</span>
                <span class="entry-author" itemprop="author" itemscope itemtype="http://schema.org/Person">
                    <a itemprop="url" href="<?php echo get_the_author_link(); ?> " class="entry-author-link">
                        <span class="entry-author-name" itemprop="name"><?php echo get_the_author(); ?></span>
                    </a>
                </span>
                <div class="sr-only" itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
                    <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                        <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $custom_logo_img = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) {
                            $custom_logo_uri = $custom_logo_img[0];
                        } else {
                            $custom_logo_uri = STARTER_IMG . '/hero-1.jpg';
                        }
                        ?>
                        <img src="<?php echo $custom_logo_uri; ?>" />
                        <meta itemprop="url" content="<?php echo $custom_logo_uri; ?>">
                    </span>
                    <span itemprop="name"><?php bloginfo('name'); ?></span>
                </div>
            </p>            
        </header><!-- .entry-header -->

        <div class="entry-content" itemprop="articleBody">
            <img class="float-left my-2 mr-3" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" itemprop="image" />
            <?php the_content(); ?>
        </div><!-- .entry-content -->

    </article>   