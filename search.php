<?php 
/**
 * The template for displaying search results pages
 * 
 * @link https://codex.wordpress.org/Creating_a_Search_Page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();
?>

    <div class="hero-content">
        <h2 class="sr-only">Hero Content</h2>
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                 <div class="carousel-item active vw-100 vh-75" style="background-image: url(<?php echo STARTER_IMG . '/hero-1.jpg'; ?>);">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Dillon Shook</h3>
                        <p>Photo by Rolands Varsbergs on Unsplash</p>
                    </div>
                </div>
            </div><!-- .carousel-inner -->
        </div><!-- .carousel -->
    </div><!-- .hero-content -->

    <nav class="site-breadcrumb bg-light" aria-label="breadcrumb">
        <div class="container">
            <?php starter_the_breadcrumb(); ?>
        </div><!-- .container -->
    </nav><!-- .site-breadcrumb -->
    
    <div class="main-content py-3 py-md-5">
        <div class="container">
            <div class="row">

                <section id="primary" class="content-area col order-0 order-sm-1">
                    <div id="main" class="site-main" itemscope itemtype="http://schema.org/Blog">
                                
                        <?php 
                        // The Query
                        $search_query = new WP_Query(array(
                            's' => get_search_query()
                        ));

                        if ( $search_query->have_posts() ) : ?>

                            <header class="page-header">
                                <h2 class="page-title display-3 text-center font-italic mb-3"><?php _e( 'Search results for:', 'starter-text-domain' ); ?></h2>
                            </header>
                            
                            <div class="page-content">
                                <?php 
                                while ( $search_query->have_posts() ) : $search_query->the_post(); $search_post = $search_query->post; ?>

                                    <article class="mb-3">
                                        <header class="entry-header">
                                            <h3 class="entry-title"><a href="<?php echo get_permalink($search_post->ID); ?>" rel="bookmark"><?php echo get_the_title($search_post->ID); ?></a></h3>
                                        </header>
                                        <div class="entry-content">
                                            <?php echo starter_get_the_excerpt(150,$search_post->ID); ?>
                                        </div>
                                    </article>

                                <?php 
                                endwhile; 
                                ?>
                            </div><!-- .page-content -->
                            
                            <?php
                        else :

                            // no posts found
                            get_template_part( 'template-parts/content', 'none' );

                        endif;
                        ?>
                    
                    </div><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .main-content -->

<?php 
get_footer(); 
?>