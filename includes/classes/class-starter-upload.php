<?php 
/**
 * Change Filenames for Uploads
 *
 * @link https://wpartisan.me/tutorials/rename-clean-wordpress-media-filenames
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/wp_handle_upload_prefilter
 */

if ( ! defined( 'ABSPATH' ) ) {
    die('Nope.');
}

class Starter_Upload {

    public function __construct(){
        add_filter( 'wp_handle_upload_prefilter', array( $this, 'reinit_upload_file_name' ) );
    }

    public function reinit_upload_file_name( $file ) {

        if ( !current_user_can('upload_files') ) {
            return $file;
        }

        // Convert urlencode to urldecode
        $file['name'] = urldecode($file['name']);

        // Convert string to lower
        $file['name'] = strtolower($file['name']);

        // Remove Invalid Character
        $invalid = array(
            ' '   => '-',
            '%20' => '-',
            '_'   => '-',
        );
        $file['name'] = str_replace( array_keys( $invalid ), array_values( $invalid ), $file['name'] );
        
        // Add Prefix
        $current_user = wp_get_current_user();
        $current_user_name = $current_user->display_name;
        // $current_server_name = preg_replace('/^www\./','',$_SERVER['SERVER_NAME']);
        // $current_domain_name = explode('.', $current_server_name)[0];
        $prefix = $current_user_name .'-'. current_time('Ymd');
        $file['name'] = $prefix .'-'. $file['name'];

        // Convert to ASCII
        $file['name'] = sanitize_file_name( $file['name'] );
     
        return $file;
    }

}

// new Starter_Upload();