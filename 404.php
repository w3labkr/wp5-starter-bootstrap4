<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();
?>

    <div class="main-content">

        <div id="primary" class="content-area order-0 order-sm-1 p-0">
            <div id="main" class="site-main" itemscope itemtype="http://schema.org/Blog">

                <article class="vw-100 vh-100 d-flex flex-column align-items-center m-auto">
                    <header class="page-header mb-auto">
                        <h2 class="page-title sr-only">Page not found</h2>
                    </header>
                    <div class="page-content">
                        <span class="display-1" style="font-size: 40vw; font-weight: 700; line-height: 1;">404</span>
                        <p class="text-center">Take me back to <a href="<?php echo get_bloginfo('url'); ?>">Homepage</a></p>
                    </div>
                    <footer class="page-footer mt-auto mb-3">
                        <div class="site-copyright text-center">
                            <?php printf( 'Copyright(c) <span itemprop="copyrightYear">%1$s</span> by <span itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Person"><a href="%3$s" target="_blank"><span itemprop="name">%2$s</span></a></span>.', '2019', 'w3labkr', 'https://github.com/w3labkr/wp-starter-bootstrap4' ); ?>
                        </div>
                    </footer>
                </article>

            </div><!-- #main -->
        </div><!-- #primary -->

    </div><!-- .main-content -->

<?php
get_footer();
?>
