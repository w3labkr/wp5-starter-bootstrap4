<?php 
/**
 * Displays a Breadcrumb based on permalink structure
 *
 * @link https://stackoverflow.com/questions/25708109/how-to-create-breadcrumbs-using-wordpress-nav-menu-without-plugin
 * @link https://www.codexworld.com/wordpress-how-to-display-breadcrumb-without-plugin/
 */

if ( ! defined( 'ABSPATH' ) ) {
    die('Nope.');
}

class Starter_Breadcrumb {

    public function __construct(){

        $this->views();

    }

    public function views() {

        $structure = get_option('permalink_structure');

        switch ( $structure ) {
            // Plain
            case '': $this->view_plain(); break;
            // Day and name
            case '/%year%/%monthnum%/%day%/%postname%/': $this->view_postname(); break;
            // Month and name
            case '/%year%/%monthnum%/%postname%/': $this->view_postname(); break;
            // Numeric
            case '/archives/%post_id%': $this->view_postname(); break;
            // Post name
            case '/%postname%/': $this->view_postname(); break;
            // Custom Structure
            case '/%category%/%postname%/': $this->view_postname(); break;
        }

    }

    public function view_plain() {

        // HTML
        $html  = '';
        $html .= '<h3 class="breadcrumb-title">Breadcrumb</h3>';
        $html .= '<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';

            // Home
            $html .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
                $html .= '<a href="'. get_bloginfo('url') .'" itemprop="item">';
                    $html .= '<span itemprop="name">'. ucfirst('Home') .'</span>';
                    $html .= '<meta itemprop="position" content="0" />';
                $html .= '</a>';
            $html .= '</li>';

            if ( !is_home() ) {

                $name = '';

                if ( isset($_GET['p']) || !empty($_GET['p']) ) {
                    $name = get_post_field( 'post_title', $_GET['p'] );
                }
                elseif ( isset($_GET['page_id']) || !empty($_GET['page_id']) ) {
                    $name = get_post_field( 'post_title', $_GET['page_id'] );
                }
                elseif ( isset($_GET['tag']) || !empty($_GET['tag']) ) {
                    $name = $_GET['tag'];
                }
                elseif ( isset($_GET['cat']) || !empty($_GET['cat']) ) {
                    $name = get_cat_name( $_GET['cat'] );
                }
                elseif ( isset($_GET['m']) || !empty($_GET['m']) ) {
                    if ( preg_match( "/^[\d]{1,5}$/", $_GET['m']) ) {
                        $name = 'Year';
                    } elseif( preg_match( "/^[\d]{6,7}$/", $_GET['m']) ) {
                        $name = 'Month';
                    } elseif( preg_match( "/^[\d]{8,}$/", $_GET['m']) ) {
                        $name = 'Day';
                    }
                }
                elseif ( isset($_GET['s']) || !empty($_GET['s']) ) {
                    $name = _e( 'Search', 'starter-text-domain' );
                }

                $html .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
                    $html .= '<span itemprop="name">'. ucfirst($name) .'</span>';
                    $html .= '<meta itemprop="position" content="1" />';
                $html .= '</li>';

            }

        $html .= '</ol>';

        echo $html;

    }

    public function view_postname() {

        $request = $_SERVER['REQUEST_URI'];
        $param = $_SERVER['QUERY_STRING'];

        // Remove parameter
        if ( !empty($param) ) {
            $regex_param = "/(?:\?.*)/";
            if ( preg_match( $regex_param, $request ) ) {
                $request = preg_replace( $regex_param, '', $request );
            }
        }

        // Remove the beginning and trailing slash
        $regex_search = "/^(?:\/)|(?:\/)$/";
        $items = array();
        if ( preg_match( $regex_search, $request ) ) {
            $request = preg_replace( $regex_search, '', $request );
            $items = explode( '/', $request );
        }

        // HTML
        $html  = '';
        $html .= '<h3 class="breadcrumb-title">Breadcrumb</h3>';
        $html .= '<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';

            // Home
            $html .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
                $html .= '<a href="'. get_bloginfo('url') .'" itemprop="item">';
                    $html .= '<span itemprop="name">'. ucfirst('Home') .'</span>';
                    $html .= '<meta itemprop="position" content="0" />';
                $html .= '</a>';
            $html .= '</li>';

            if ( !is_home() ) {

                $last = count($items);
                foreach ( $items as $key=>$name ) {
                    
                    $count = (int)$key + 1;

                    if ( is_search() ) {
                        $name = 'Search';
                    }                    

                    if ( $count == $last ) {
                        $html .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
                            $html .= '<span itemprop="name">'. ucfirst($name) .'</span>';
                            $html .= '<meta itemprop="position" content="'. $count .'" />';
                        $html .= '</li>';
                    } 
                    else {

                        $has_archive = ( preg_match( "/(?:archives|category|tag)/i", $name ) ) ? true : false;

                        $href  = get_bloginfo('url');
                        $href .= '/' . implode( '/', array_slice($items, 0, $count) );

                        $html .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
                            $html .= ( $has_archive ) ? '' : '<a href="'. $href .'" itemprop="item">';
                                $html .= '<span itemprop="name">'. ucfirst($name) .'</span>';
                                $html .= '<meta itemprop="position" content="'. $count .'" />';
                            $html .= ( $has_archive ) ? '' : '</a>';
                        $html .= '</li>';

                    }
                }

            }

        $html .= '</ol>';

        echo $html;

    }

}

// new Starter_Breadcrumb();