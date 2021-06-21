<?php
/**
 * Template Name: Bootstrap4 Sitemap
 * Template Post Type: page
 *
 * Show all titles of post type posts such as tag clouds
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

                <div id="primary" class="content-area col order-0 order-sm-1">
                    <div id="main" class="site-main" itemscope itemtype="http://schema.org/Blog">

                        <article>

                            <header class="entry-header">
                                <h2 class="entry-title display-3 text-center font-italic mb-3" itemprop="name headline"><?php the_title(); ?></h2>
                            </header>
                            <div class="entry-content">
                                <div class="sitemap-menu">
                                    <ul class="sitemap-nav row mb-0 pl-0" style="list-style: none;">
                                    <?php wp_list_pages(array(
                                        'title_li'    => '',
                                        'child_of'    => 0, // (int) Display only the sub-pages of a single page by ID.
                                        'exclude'     => '', // (string) Comma-separated list of page IDs to exclude.
                                        'post_type'   => 'page',
                                        'post_status' => 'publish',
                                        'sort_column' => 'menu_order, post_title', // (string) Comma-separated list of column names to sort the pages by
                                        'walker'      => new Starter_Bootstrap4_Walker_Page_Sitemap()
                                    )); ?>
                                    </ul>
                                </div>
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