
    </div><!-- #content -->

    <footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">
        <div class="site-info widget-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <?php starter_is_active_sidebar( 'footer-widget-1' ); ?>
                    </div>
                    <div class="col-md-3">
                        <?php starter_is_active_sidebar( 'footer-widget-2' ); ?>
                    </div>
                    <div class="col-md-3">
                        <?php starter_is_active_sidebar( 'footer-widget-3' ); ?>
                    </div>
                    <div class="col-md-3">
                        <?php starter_is_active_sidebar( 'footer-widget-4' ); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-copyright p-3 text-center">
            <div class="container">
                <?php printf( 'Copyright(c) <span itemprop="copyrightYear">%1$s</span> by <span itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Person"><a href="%3$s" target="_blank"><span itemprop="name">%2$s</span></a></span>.', '2019', 'Krescentmoon', 'https://github.com/krescentmoon/wp-starter-bootstrap4' ); ?>
            </div>
        </div>
    </footer><!-- #colophon -->

</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>