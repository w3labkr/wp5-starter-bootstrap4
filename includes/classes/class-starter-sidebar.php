<?php 
/**
 * Change widget title from H1 to H3
 *
 * @link http://support.averta.net/en/ticket/change-widget-title-from-h3-to-h2/
 */

if ( ! defined( 'ABSPATH' ) ) {
    die('Nope.');
}

class Starter_Sidebar {

    public $_opts;
    public function __construct( $opts=array() ){
        $this->_opts = $opts;
        add_filter( 'register_sidebar', array( $this, 'widget_title' ) );
    }

    public function options() {
        
        $options = $this->_opts;

        $defaults = array(
            'title_tag' => 'h3',
        );

        $settings = ( is_array($options) ) ? array_replace_recursive($defaults, $options) : $defaults;

        return $settings;
    }

    public function widget_title( $sidebar ) {
        global $wp_registered_sidebars;

        if ( isset( $sidebar['before_title'] ) !== true ) {
            return;
        }

        $opts = $this->options();
        $title_tag = $opts['title_tag'];

        $id = $sidebar['id'];
        $changes = $wp_registered_sidebars[$id];

        if ( preg_match( '/^<(?:h1|h2|h3|h4|h5|h6)/', $changes['before_title'] ) ) {
            $changes['before_title'] = preg_replace( "/^<h1/", "<{$title_tag}", $changes['before_title'] );
            $changes['after_title'] = "</{$title_tag}>";
            $wp_registered_sidebars[$id] = $changes;
        }

    }

}

// new Starter_Sidebar();