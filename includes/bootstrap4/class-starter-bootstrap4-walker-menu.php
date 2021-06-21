<?php 
/**
 * Clean Html Menu Walker for bootstrap4
 * 
 * @link https://codex.wordpress.org/Class_Reference/Walker
 * @link https://code.tutsplus.com/tutorials/understanding-the-walker-class--wp-25401
 * @link https://www.smashingmagazine.com/2015/10/customize-tree-like-data-structures-wordpress-walker-class/
 */

if ( ! defined( 'ABSPATH' ) ) {
    die('Nope.');
}

class Starter_Bootstrap4_Walker_Menu extends Walker {

    // Tell Walker where to inherit it's parent and id values
    // Set the properties of the element which give the ID of the current item and its parent
    var $db_fields = array(
        'parent' => 'menu_item_parent', 
        'id'     => 'db_id' 
    );

    // Displays start of a level. E.g '<ul>'
    public function start_lvl( &$output, $depth=0, $args=array() ) {
        // Only one level is allowed to use the Bootstrap 4 menu.
        if ( $depth == 0 ) {
            $output .= "<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">\n";
        }
    }

    // Displays end of a level. E.g '</ul>'
    public function end_lvl( &$output, $depth=0, $args=array() ) {
        // Only one level is allowed to use the Bootstrap 4 menu.
        if ( $depth == 0 ) {
            $output .= "</div>\n";
        }
        else {
            $output .= "<div class=\"dropdown-divider\"></div>\n";
        }
    }

    // Displays start of an element. E.g '<li> Item Name'
    public function start_el( &$output, $item, $depth=0, $args=array(), $id=0 ) {

        // Conditional
        $has_children = ( in_array( 'menu-item-has-children', $item->classes ) ) ? true : false;
        $is_current = ( $item->current == 1 ) ? true : false;
        $is_active = ($is_current)? 'active' : '';
        $sr_only = ($is_current)? 'sr-only' : '';

        // Attribute
        $atts = array(
            'title'  => $item->title,
            'url'    => $item->url,
            'target' => ( empty($item->target) ) ? 'target="_self"' : 'target="'. $item->target .'"',
        );

        // HTML
        if ( $depth == 0 ) {
            if ( $has_children ) {
                // dropdown-list
                $output .= "<li class=\"nav-item dropdown {$is_active}\">";
                $output .= "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" itemprop=\"url\">";
                    $output .= "<span itemprop=\"name\">{$atts['title']}</span>";
                    if ( $is_current ) {
                        $output .= "<span class=\"sr-only\">(current)</span>";
                    }
                $output .= "</a>";
            } 
            else {
                $output .= "<li class=\"nav-item {$is_active}\">";
                $output .= "<a class=\"nav-link\" href=\"{$atts['url']}\" {$atts['target']} itemprop=\"url\">";
                    $output .= "<span itemprop=\"name\">{$atts['title']}</span>";
                    if ( $is_current ) {
                        $output .= "<span class=\"sr-only\">(current)</span>";   
                    }
                $output .= "</a>";  
            }

        }
        else {
            // dropdown-item            
            $output .= "<a class=\"nav-item dropdown-item {$sr_only}\" href=\"{$atts['url']}\" {$atts['target']} itemprop=\"url\">";
                $output .= "<span itemprop=\"name\">{$atts['title']}</span>";
            $output .= "</a>";
        }

    }

    // Displays end of an element. E.g '</li>'
    public function end_el( &$output, $item, $depth=0, $args=array() ) {
        if ( $depth == 0 ) {
            $output .= "</li>\n";
        }
    }

}