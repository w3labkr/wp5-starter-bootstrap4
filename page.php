<?php 
/**
 * Page Templates
 * 
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

                <div id="primary" class="content-area col order-0 order-sm-1">
                    <main id="main" class="site-main" itemscope itemtype="http://schema.org/Blog">

                        <?php
                        if ( have_posts() ) : 
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', get_post_type() );

                                // Displays page links for paginated posts 
                                starter_the_post_navigation(array( 
                                    'prev' => array( 'in_same_term' => false ), 
                                    'next' => array( 'in_same_term' => false ),
                                ));

                            endwhile;
                        else:

                            // no posts found
                            get_template_part( 'template-parts/content', 'none' );

                        endif;
                        ?>

                    </main>
                </div><!-- #primary -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .main-content -->

<?php 
get_footer(); 
?>