<?php
/**
 * Template Name: Bootstrap4 Home
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
                 <div class="carousel-item active vw-100 vh-100" style="background-image: url(<?php echo STARTER_IMG . '/hero-1.jpg'; ?>);">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Dillon Shook</h3>
                        <p>Photo by Rolands Varsbergs on Unsplash</p>
                    </div>
                </div>
                <div class="carousel-item vw-100 vh-100" style="background-image: url(<?php echo STARTER_IMG . '/hero-2.jpg'; ?>);">
                    <div class="carousel-caption d-none d-md-block">
                      <h3>LUM3N</h3>
                      <p>Photo by Rolands Varsbergs on Unsplash</p>
                    </div>
                </div>
                <div class="carousel-item vw-100 vh-100" style="background-image: url(<?php echo STARTER_IMG . '/hero-3.jpg'; ?>);">
                    <div class="carousel-caption d-none d-md-block">
                      <h3>LUM3N</h3>
                      <p>Photo by Rolands Varsbergs on Unsplash</p>
                    </div>
                </div>
                <div class="carousel-item vw-100 vh-100" style="background-image: url(<?php echo STARTER_IMG . '/hero-4.jpg'; ?>);">
                    <div class="carousel-caption d-none d-md-block">
                      <h3>Tim van der Kuip</h3>
                      <p>Photo by Rolands Varsbergs on Unsplash</p>
                    </div>
                </div>
                <div class="carousel-item vw-100 vh-100" style="background-image: url(<?php echo STARTER_IMG . '/hero-5.jpg'; ?>);">
                    <div class="carousel-caption d-none d-md-block">
                      <h3>Hello I'm Nik</h3>
                      <p>Photo by Rolands Varsbergs on Unsplash</p>
                    </div>
                </div>
            </div><!-- .carousel-inner -->
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div><!-- .hero-content -->
    
    <div class="main-content py-3 py-md-5">

        <div id="primary" class="content-area order-0 order-sm-1">
            <div id="main" class="site-main" itemscope itemtype="http://schema.org/Blog">

                <section class="mb-3">
                    <div class="container">
                        <?php 
                        $blog = new WP_Query( array( 
                            'post_type' => 'post',
                            'posts_per_page' => 4
                        ) );
                        if ( $blog->have_posts() ) : ?>

                            <header class="page-header">
                                <h2 class="page-title display-3 text-center font-italic mb-3">Blog</h2>
                            </header>

                            <div class="page-content">

                                <div class="card-columns blog-card-columns">
                                <?php 
                                while ( $blog->have_posts() ) : $blog->the_post(); $blog_post = $blog->post; ?>

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

                                <?php
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
                    </div>
                </section>


                <section class="mb-3">
                    <div class="container">
                        <header class="page-header">
                            <h2 class="page-title display-3 text-center font-italic mb-3">News</h2>
                        </header>
                        <div class="page-content">
                            <?php starter_the_fetch_feed( 'https://news.google.com/rss/search?q=bootstrap4', 3, 'every_week' ); ?>
                        </div>
                    </div>
                </section>


                <section class="mb-3">
                    <div class="container">
                        <header class="page-header">
                            <h2 class="page-title display-3 text-center font-italic mb-3">Features</h2>
                        </header>
                        <div class="page-content">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <h3 class="text-center font-italic mb-3">Main Features</h3>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><a href="https://validator.w3.org">W3C Validated Code</a></li>
                                        <li class="list-group-item"><a href="https://mapstyle.withgoogle.com/">Google Map Style</a></li>
                                        <li class="list-group-item"><a href="https://search.google.com/structured-data/testing-tool">SEO Optimized</a></li>
                                        <li class="list-group-item">Blog Details</li>
                                        <li class="list-group-item">Clean Code</li>
                                        <li class="list-group-item">Cross Browser Support</li>
                                        <li class="list-group-item">Fully Responsive Design</li>
                                        <li class="list-group-item">No console error</li>
                                        <li class="list-group-item">User Friendly Code</li>
                                        <li class="list-group-item">and much more…</li>
                                    </ul>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <h3 class="text-center font-italic mb-3">Libraries</h3>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><a href="https://getbootstrap.com/">Bootstrap 4</a></li>
                                        <li class="list-group-item"><a href="https://fontawesome.com/">Font Awesome Icon 5</a></li>
                                        <li class="list-group-item"><a href="https://jquery.com/">jquery</a></li>
                                        <li class="list-group-item"><a href="https://github.com/aFarkas/html5shiv">html5shiv</a></li>
                                        <li class="list-group-item"><a href="https://github.com/scottjehl/Respond">respond</a></li>
                                        <li class="list-group-item"><a href="https://github.com/keithclark/selectivizr">selectivizr</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <h3 class="text-center font-italic mb-3">PhotoCredit</h3>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><a href="https://unsplash.com/">Unsplash</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </section>

            </div><!-- #main -->
        </div><!-- #primary -->

    </div><!-- .main-content -->

<?php 
get_footer(); 
?>