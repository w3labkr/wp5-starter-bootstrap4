<?php
/**
 * Sharing
 *
 * @link https://jetpack.com/support/sharing/
 */

if ( ! defined( 'ABSPATH' ) ) {
    die('Nope.');
}

class Starter_Third_Party_Jetpack_Sharing {

    public $_opts;

    public function __construct( $opts=array() ){
        $this->_opts = $opts;
        add_filter( 'sharing_services_email', '__return_true' );
        add_action( 'loop_start', array( $this, 'view_remove_share' ) );
        add_action( 'wp_head', array( $this, 'view_mobile_share' ) );
    }

    public function options() {
        
        $options = $this->_opts;

        $defaults = array(

        );

        $settings = ( is_array($options) ) ? array_replace_recursive($defaults, $options) : $defaults;

        return $settings;
    }

    public function view_remove_share() {
        remove_filter( 'the_content', 'sharing_display', 19 );
        remove_filter( 'the_excerpt', 'sharing_display', 19 );
        if ( class_exists( 'Jetpack_Likes' ) ) {
            remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
        }
    }

    // Check if we are on mobile
    public function view_is_mobile() {
     
        // Are Jetpack Mobile functions available?
        if ( ! function_exists( 'jetpack_is_mobile' ) ) {
            return false;
        }
     
        // Is Mobile theme showing?
        if ( isset( $_COOKIE['akm_mobile'] ) && $_COOKIE['akm_mobile'] == 'false' ) {
            return false;
        }
     
        return jetpack_is_mobile();
    }
     
    // Let's remove the sharing buttons when on mobile
    public function view_mobile_share() {
     
        // On mobile?
        if ( $this->view_is_mobile() ) {
            add_filter( 'sharing_show', '__return_false' );
        }
    }    

}
