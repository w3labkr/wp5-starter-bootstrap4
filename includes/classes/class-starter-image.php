<?php 
/**
 * Reinit Default Image Setting
 */

if ( ! defined( 'ABSPATH' ) ) {
    die('Nope.');
}

class Starter_Image {

    public function __construct(){

        // Image Quality
        add_filter( 'jpeg_quality', array( $this, 'reinit_jpeg_quality' ) );

        // Remove the 1600px limit for images included in `srcset` attributes.
        add_filter( 'max_srcset_image_width', array( $this, 'remove_max_srcset_image_width' ) );

    }

    /**
     * To change JPEG Compression, 
     * temporarily add the below code to functions.php 
     * then refresh the site to re-compress all thumbnails on the site.
     *
     * @link https://developer.wordpress.org/reference/hooks/jpeg_quality/
     */
    public function reinit_jpeg_quality() {
        return 100;
    }

    /**
     * Remove the 1600px limit for images included in `srcset` attributes.
     *
     * In WordPress 4.4 max srcset size is set to 1600px wide by default, 
     * if you have images larger than that size that you’d like included in the srcset you can use this filter:
     *
     * @link https://developer.wordpress.org/reference/hooks/max_srcset_image_width/
     */
    public function remove_max_srcset_image_width() {
        return false;
    }

    /**
     * Get size information for all currently-registered image sizes.
     *
     * @link https://codex.wordpress.org/Function_Reference/get_intermediate_image_sizes
     * 
     * @global $_wp_additional_image_sizes
     * @uses   get_intermediate_image_sizes()
     * @return array $sizes Data for all currently-registered image sizes.
     */
    public function get_image_sizes() {
        global $_wp_additional_image_sizes;

        $sizes = array();

        foreach ( get_intermediate_image_sizes() as $_size ) {
            $sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
            $sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
            $sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
        }

        return $sizes;
    }

}

// new Starter_Image();