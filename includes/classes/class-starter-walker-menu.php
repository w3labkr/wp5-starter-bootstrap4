<?php 
/**
 * Clean Html Menu Walker
 * 
 * @link https://codex.wordpress.org/Class_Reference/Walker
 */

if ( ! defined( 'ABSPATH' ) ) {
    die('Nope.');
}

class Starter_Walker_Menu extends Walker {

    // Tell Walker where to inherit it's parent and id values
    // Set the properties of the element which give the ID of the current item and its parent
    var $db_fields = array(
        'parent' => 'menu_item_parent', 
        'id'     => 'db_id' 
    );

    // Displays start of a level. E.g '<ul>'
    public function start_lvl( &$output, $depth=0, $args=array() ) {
        $output .= "<ul>\n";
    }

    // Displays end of a level. E.g '</ul>'
    public function end_lvl( &$output, $depth=0, $args=array() ) {
        $output .= "</ul>\n";
    }

    // Displays start of an element. E.g '<li> Item Name'
    public function start_el( &$output, $item, $depth=0, $args=array(), $id=0 ) {

        // Attribute
        $atts = array(
            'title'  => $item->title,
            'url'    => $item->url,
            'target' => ( empty($item->target) ) ? 'target="_self"' : 'target="'. $item->target .'"',
        );

        // HTML
        $output .= "<li>\n";
            $output .= "<a href=\"{$atts['url']}\" {$atts['target']} itemprop=\"url\">";
                $output .= "<span itemprop=\"name\">{$atts['title']}</span>";
            $output .= "</a>";

    }

    // Displays end of an element. E.g '</li>'
    public function end_el( &$output, $item, $depth=0, $args=array() ) {
        $output .= "</li>\n";
    }

}