<?php 
/**
 * Generate custom search form
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 */

if ( ! defined( 'ABSPATH' ) ) {
    die('Nope.');
}

class Starter_Search_Form {

    public function __construct(){
        
        add_filter( 'get_search_form', array( $this, 'views' ) );

    }

    public function views( $form ) {
        
        $form = '<form action="'. esc_url( home_url('/') ) .'" method="get">
            <label>
                <input type="search" name="s" id="s" placeholder="Search" value="' . get_search_query() . '">
            </label>
            <button type="submit">'. esc_attr__( 'Search', 'starter-text-domain' ) .'</button>
        </form>';
     
        return $form;
    }

}

// new Starter_Search_Form();