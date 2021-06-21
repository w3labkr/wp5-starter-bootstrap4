<?php 
/**
 * The sidebar containing the main widget area
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
    return;
}
?>
<aside id="tertiary" class="widget-area col-sm-3 order-2 order-sm-2 pt-4" itemscope itemtype="http://schema.org/WPSideBar">
    <h2 class="sr-only">Tertiary Content</h2>
    <?php dynamic_sidebar( 'sidebar-2' ); ?>
</aside><!-- #tertiary -->