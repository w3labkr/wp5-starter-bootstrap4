<?php
/**
 * Template Name: Bootstrap4 Contact
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

    <div class="map-content" itemscope itemtype="http://schema.org/LocalBusiness">
        <span class="sr-only" itemprop="name">Local business</span>
        <span class="sr-only" itemprop="address">Avon NSW 2574, Australia</span>
        <span class="sr-only" itemprop="telephone">000-0000-0000</span>
        <img class="sr-only" itemprop="image" src="<?php echo STARTER_IMG . '/map-retro.jpg'; ?>" alt="Local business"/>
        <div class="map map-google" style="width:100%;height:425px;" 
             data-starter-map-google='{"center": {"lat":-34.397,"lng":150.644},"zoom":8,"styleWizard":"retro"}'>
        </div>
    </div>
    
    <div class="main-content py-3 py-md-5">
        <div class="container">
            <div class="row">

                <div id="primary" class="content-area col order-0 order-sm-1">
                    <div id="main" class="site-main" itemscope itemtype="http://schema.org/Blog">

                        <article <?php post_class(); ?>>

                            <header class="entry-header">
                                <h2 class="entry-title display-3 text-center font-italic mb-3" itemprop="name headline"><?php echo get_the_title(); ?></h2>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div><!-- .entry-content -->

                        </article>
                        
                    </div><!-- #main -->
                </div><!-- #primary -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .main-content -->

<?php 
get_footer(); 
?>