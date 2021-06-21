<?php
/**
 * Template Name: Bootstrap4 News
 * Template Post Type: page
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
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

                        <header class="page-header">
                            <h2 class="page-title display-3 text-center font-italic mb-3"><?php the_title(); ?></h2>
                        </header>
                        <div class="page-content">
                            <?php starter_the_fetch_feed( 'https://news.google.com/rss/search?q=bootstrap4', 10, 'every_week' ); ?>
                        </div><!-- .page-content -->

                    </div><!-- #main -->
                </section><!-- #primary -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .main-content -->

<?php 
get_footer(); 
?>