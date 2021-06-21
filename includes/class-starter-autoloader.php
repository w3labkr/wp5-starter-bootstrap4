<?php 
/**
 * Registers a function to be autoloaded.
 * 
 * @link https://developer.wordpress.org/reference/functions/spl_autoload_register/
 * @link https://dsgnwrks.pro/how-to/using-class-autoloaders-in-wordpress/
 */

if ( ! defined( 'ABSPATH' ) ) {
    die('Nope.');
}

class Starter_Autoloader {

    private $include_path = '';

    public function __construct(){

        if ( function_exists( '__autoload' ) ) {
            spl_autoload_register( '__autoload' );
        }

        spl_autoload_register( array( $this, 'autoload' ) );

        $this->include_path = get_stylesheet_directory() . '/includes';

    }

    public static function is_class( $class, $prefix ) {
        if ( 0 === strpos( $class, $prefix ) ) {
            return true;
        }
        return false;
    }

    public function autoload( $class ){

        if ( strpos( $class, 'Starter_' ) !== 0 ) {
            return;
        }

        $name = str_replace( '_', '-', $class );
        $name = strtolower( $name ); 
        
        $include_path = $this->include_path;

        if ( $this->is_class( $class, 'Starter_Admin_' ) ) {
            $include_path = $include_path . "/admin/class-{$name}.php";            
        } 
        elseif ( $this->is_class( $class, 'Starter_Metabox_' ) ) {
            $include_path = $include_path . "/admin/metabox/class-{$name}.php";            
        } 
        elseif ( $this->is_class( $class, 'Starter_Shortcode_' ) ) {
            $include_path = $include_path . "/shortcode/class-{$name}.php";            
        } 
        elseif ( $this->is_class( $class, 'Starter_Bootstrap4_' ) ) {
            $include_path = $include_path . "/bootstrap4/class-{$name}.php";            
        } 
        elseif ( $this->is_class( $class, 'Starter_Third_Party_' ) ) {
            $include_path = $include_path . "/third-party/class-{$name}.php";            
        } 
        else {
            $include_path = $include_path . "/classes/class-{$name}.php";
        }

        // If a file is found
        if ( file_exists( $include_path ) ) {
            include ( $include_path );
        }

    }

}

new Starter_Autoloader();