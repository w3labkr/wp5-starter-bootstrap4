<?php
/**
 * Creating the Archive Index Template and Page
 * 
 * @link https://codex.wordpress.org/Creating_an_Archive_Index
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
                    if ( have_posts() ) : ?>
                        
                        <header class="page-header">
                            <h2 class="page-title display-3 text-center font-italic mb-3"><?php echo get_the_archive_title(); ?></h2>
                        </header>

                        <div class="page-content">
                            <div class="card-columns blog-card-columns">
                            <?php 
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content' );
                                
                            endwhile; 
                            ?>
                            </div><!-- .card-columns -->
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