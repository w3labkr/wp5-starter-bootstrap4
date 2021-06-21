<?php 
/**
 * Displays page links for paginated posts 
 *
 * @link https://codex.wordpress.org/Pagination
 * @link https://developer.wordpress.org/themes/functionality/pagination/
 * @link https://codex.wordpress.org/Function_Reference/get_adjacent_post
 */

if ( ! defined( 'ABSPATH' ) ) {
    die('Nope.');
}

class Starter_Post_Navigation {

    public $_opts;

    public function __construct( $opts=array() ){

        $this->_opts = $opts;
        $this->views();

    }

    public function options() {
        
        $options = $this->_opts;

        $defaults = array(
            'prev' => array(
                'in_same_term' => true,
                'excluded_terms' => '',
                'previous' => true,
                'taxonomy' => 'category',
            ),
            'next' => array(
                'in_same_term' => true,
                'excluded_terms' => '',
                'previous' => false,
                'taxonomy' => 'category',
            ),
            'infinite' => true,
            'infinite_post' => get_post_type(),
        );

        $settings = ( is_array($options) ) ? array_replace_recursive($defaults, $options) : $defaults;

        return $settings;
    }

    public function views() {

        $opts = $this->options();

        $html  = '';
        $html .= '<nav class="post-navigation">';
            $html .= '<ul class="pagination">';
                
                // Prev
                $prev_post = get_adjacent_post( $opts['prev']['in_same_term'], $opts['prev']['excluded_terms'], $opts['prev']['previous'], $opts['prev']['taxonomy'] );
                
                if ( is_a( $prev_post, 'WP_Post' ) ) {
                    $html .= self::view_prev($prev_post);
                }
                else {

                    if ( $opts['infinite'] ) {
                        $infinite_query = new WP_Query(array(
                            'post_type' => $opts['infinite_post'],
                            'posts_per_page' => 1,
                            'order' => 'DESC',
                        )); 
                        if ( $infinite_query->have_posts() ) : $infinite_query->the_post();
                            $html .= self::view_prev($infinite_query);
                        else :
                            $html .= self::view_noexist('prev');
                        endif;
                        wp_reset_query();
                    }
                    else {
                        $html .= self::view_noexist('prev');
                    }

                }

                // Next
                $next_post = get_adjacent_post( $opts['next']['in_same_term'], $opts['next']['excluded_terms'], $opts['next']['previous'], $opts['next']['taxonomy'] );

                if ( is_a( $next_post, 'WP_Post' ) ) {
                    $html .= self::view_next($next_post);
                }
                else {

                    if ( $opts['infinite'] ) {
                        $infinite_query = new WP_Query(array(
                            'post_type' => $opts['infinite_post'],
                            'posts_per_page' => 1,
                            'order' => 'ASC',
                        )); 
                        if ( $infinite_query->have_posts() ) : $infinite_query->the_post();
                            $html .= self::view_next($infinite_query);
                        else :
                            $html .= self::view_noexist('prev');
                        endif;
                        wp_reset_query();
                    }
                    else {
                        $html .= self::view_noexist('prev');
                    }

                }

            $html .= '</ul>';
        $html .= '</nav>';

        echo $html;

    }

    public function view_prev( $post ) {

        $html  = '';
        $html .= '<li>';
            $html .= '<a href="'. get_permalink( $post->ID ) .'" rel="Previous">';
                $html .= '<span>Prev</span>';
            $html .= '</a>';
        $html .= '</li>';    
        
        return $html;    
    }

    public function view_next( $post ) {

        $html  = '';
        $html .= '<li>';
            $html .= '<a href="'. get_permalink( $post->ID ) .'" rel="Next">';
                $html .= '<span>Prev</span>';
            $html .= '</a>';
        $html .= '</li>';    
        
        return $html;    
    }

    public function view_noexist( $arrow='prev' ) {
        
        $html  = '';
        
        switch ($arrow) {
            case 'prev':
                $html .= '<li>';
                    $html .= '<span>Prev post does not exist.</span>';
                $html .= '</li>';
                break;
            case 'next':
                $html .= '<li>';
                    $html .= '<span>Next post does not exist.</span>';
                $html .= '</li>';
                break;            
        }

        return $html;
    }

}