<?php 
/**
 * Generate custom search form for bootstrap4
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 */

if ( ! defined( 'ABSPATH' ) ) {
    die('Nope.');
}

class Starter_Bootstrap4_Search_Form {

    public function __construct(){
        
        add_filter( 'get_search_form', array( $this, 'views' ) );

    }

    public function views( $form ) {
        
        $form  = '';
        $form .= '<form action="'. esc_url( home_url('/') ) .'" method="get" class="form-inline">';
            $form .= '<label for="s" class="sr-only">Search</label>';
            $form .= '<input class="form-control w-auto mr-1" type="search" name="s" id="s" placeholder="Search" aria-label="Search" value="' . get_search_query() . '">';
            $form .= '<button class="btn btn-outline-primary" type="submit">'. esc_attr__( 'Search', 'starter-text-domain' ) .'</button>';
        $form .= '</form>';
     
        return $form;
    }

}

// new Starter_Bootstrap4_Search_Form();