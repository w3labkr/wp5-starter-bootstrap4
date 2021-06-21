<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>

    <div class="no-results text-center">

        <header class="page-header">
            <h3 class="page-title display-1 text-center font-italic"><?php _e( 'Nothing Found', 'starter-text-domain' ); ?></h3>
        </header><!-- .page-header -->

        <div class="page-content">
        <?php if ( is_search() ) : ?>
            
            <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 
                    'starter-text-domain' ); ?></p>
            <div class="d-flex justify-content-center">
                <?php get_search_form(); ?>
            </div>

        <?php else : ?>
            
            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'starter-text-domain' ); ?></p>
            <div class="d-flex justify-content-center">
                <?php get_search_form(); ?>
            </div>

        <?php endif; ?>
        </div><!-- .page-content -->

    </div><!-- .no-results -->