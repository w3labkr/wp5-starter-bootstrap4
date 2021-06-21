<?php
/**
 * The sidebar containing the main widget area
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>
<aside id="secondary" class="widget-area col-sm-3 order-1 order-sm-0 pt-4" itemscope itemtype="http://schema.org/WPSideBar">
    <h2 class="sr-only">Secondary Content</h2>
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->