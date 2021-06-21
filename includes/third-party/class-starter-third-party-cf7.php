<?php
/**
 * Allow shortcodes in Contact Form 7
 */

if ( ! defined( 'ABSPATH' ) ) {
    die('Nope.');
}

class Starter_Third_Party_Cf7 {

    public function __construct(){
        add_action( 'wpcf7_form_elements', array( $this, 'shortcodes' ) );
    }

    public function shortcodes( $form ) {
        return do_shortcode( $form );
    }

}