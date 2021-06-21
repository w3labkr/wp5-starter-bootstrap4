<?php
/**
 * Displays a feed content
 *
 * @link https://codex.wordpress.org/Function_Reference/fetch_feed
 * @link https://developer.wordpress.org/reference/functions/fetch_feed/
 */

if ( ! defined( 'ABSPATH' ) ) {
    die('Nope.');
}

class Starter_Bootstrap4_Feed {

    public $_opts;

    public function __construct( $opts=array() ){
        $this->_opts = $opts;
        $this->includes();
        add_action( 'wp_feed_options', array( $this, 'cache_schedule' ), 10, 1 );
        $this->views();
    }

    public function options() {
        
        $options = $this->_opts;

        $defaults = array(
            'feed'     => 'https://news.google.com/rss/search?q=html5',
            'maxitem'  => 10,   // (int)
            'cache'    => 'every_year', // (string) 'every_minute', 'every_half_hour', 'every_hour', 'every_half_day', 'every_day', 'every_week', 'every_month', 'every_year'
            'message'  => array(
                'not_found' => 'Could not get first item',
            ),
            'classes' => array(
                'list'  => 'card-columns',
                'item'  => 'card',
                'body'  => 'card-body',
                'title' => 'card-title h5',
                'text'  => 'card-text',
                'image' => 'card-img-top bg-dark',
                'link'  => 'card-link',
                'date'  => 'text-muted',
            ),
        );

        $settings = ( is_array($options) ) ? array_replace_recursive($defaults, $options) : $defaults;

        return $settings;
    }

    // Get RSS Feed(s)
    public function includes() {
        include_once( ABSPATH . WPINC . '/feed.php' );
    }

    public function views() {
        $opts = $this->options();
        ?>
        <div class="<?php echo $opts['classes']['list']; ?>">
            <?php 
            // Add filters and actions prior to fetching the feed items
            if ( $opts['cache'] == false ) {
                add_filter( 'wp_feed_cache_transient_lifetime', array($this,'cache_transient'), 10, 2 );
                add_action( 'wp_feed_options', array($this,'cache_disable'), 10, 1 );
            }

            /* Fetch the feed from the soure URL specified */
            $feed = fetch_feed( $opts['feed'] );

            // Remove previously added filters and actions
            if ( $opts['cache'] == false ) {
                remove_action( 'wp_feed_options', array($this,'cache_disable'), 10, 1 );
                remove_filter( 'wp_feed_cache_transient_lifetime', array($this,'cache_transient'), 10, 2 );
            }

            $maxitems = 0;
            if ( ! is_wp_error( $feed ) ) {
                $maxitems = $feed->get_item_quantity( $opts['maxitem'] ); 
                $items = $feed->get_items( 0, $maxitems );
            }
            ?>
            <?php if ( $maxitems == 0 ) : ?>
            <article class="<?php echo $opts['classes']['item']; ?>">
                <div class="<?php echo $opts['classes']['body']; ?>">
                    <?php $this->get_the_message( $opts['classes'] ); ?>
                </div>
            </article>
            <?php else : ?>
                <?php foreach ( $items as $item ) : ?>
                <article class="<?php echo $opts['classes']['item']; ?>">
                    <?php $this->get_the_image( $item ); ?>
                    <div class="<?php echo $opts['classes']['body']; ?>">
                        <?php $this->get_the_title( $item ); ?>
                        <?php $this->get_the_description( $item ); ?>
                        <?php $this->get_the_date( $item ); ?>
                        <?php $this->get_the_link( $item ); ?>
                    </div>
                </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div><!-- .card-columns -->
    <?php
    }

    public function get_the_title ( $item ) {
        $opts = $this->options();
        
        $html  = '';
        $html .= '<h3 class="'. $opts['classes']['title'] .'">';
            $html .= esc_html( $item->get_title() );
        $html .= '</h3>';
        echo $html;
    }

    public function get_the_message() {
        $opts = $this->options();

        $html  = '';
        $html .= '<h3 class="'. $opts['classes']['title'] .'">';
            $html .= $opts['message']['not_found'];
        $html .= '</h3>';
        echo $html;
    }

    public function get_the_description ( $item ) {
        $opts = $this->options();
        
        $text = $item->get_description();
        $text = preg_replace( "/(?:<a.*?.<\/font>)/", '', $text );
        $text = strip_tags($text);
        $text = trim($text);

        $html  = '';
        $html .= '<p class="'. $opts['classes']['text'] .'">';
            $html .= $text;
        $html .= '</p>';

        echo $html;
    }

    public function get_the_image ( $item ) {
        $opts = $this->options();

        $html = '';
        if ( $enclosure = $item->get_enclosure() ) {
            if ( $enclosure->get_medium() !== NULL && $enclosure->get_medium() == 'image' ) {
                $html .= '<img ';
                $html .= 'class="'. $opts['classes']['image'] .'" ';
                $html .= 'src="'. esc_url( $enclosure->get_link() ) .'" ';
                $html .= 'alt="'. esc_html( $enclosure->get_captions() ) .'" ';
                $html .= '/>';
            }
        }
        echo $html;
    }

    public function get_the_date ( $item ) {
        $opts = $this->options();

        $html  = '';
        $html .= '<p class="'. $opts['classes']['text'] .'">';
            $html .= '<small class="'. $opts['classes']['date'] .'">';
            $html .= esc_html( $item->get_date('j F Y | g:i a') );
            $html .= '</small>';
        $html .= '</p>';
        echo $html; 
    }

    public function get_the_link ( $item ) {
        $opts = $this->options();

        $html  = '';
        $html .= '<a class="'. $opts['classes']['link'] .'" href="'. esc_url( $item->get_permalink() ) .'" target="_blank" rel="external">';
            $html .= '<small>&mdash; '. $this->get_the_source($item) .'</small>';
        $html .= '</a>';
        echo $html; 
    }

    public function get_the_source ( $item ) {
        $html = '';
        if ( $source = $item->get_item_tags('', 'source') ) {
            $html = $source[0]['data'];
        }
        return $html;
    }

    /**
     * How to delete transients written by fetch_feed()?
     * The default lifetime of a transient cached feed is 12 hours.
     * 
     * @link https://w3guy.com/altering-wordpress-feed-cache-lifetime/
     * @link https://wordpress.stackexchange.com/questions/172444/how-to-delete-transients-written-by-fetch-feed
     * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/wp_feed_cache_transient_lifetime
     */
    public function cache_schedule( $feed ) {
        $opts = $this->options();

        if ( $opts['cache'] == false ) {
            return;
        }

        if ( $feed->feed_url === $opts['feed'] ) {
            
            $feed->enable_cache(true);
            $time = DAY_IN_SECONDS;
            
            if ( $opts['cache'] === 'every_minute' ) {
                $time = MINUTE_IN_SECONDS; 
            } 
            elseif ( $opts['cache'] === 'every_half_hour' ) {
                $time = 30 * MINUTE_IN_SECONDS; 
            } 
            elseif ( $opts['cache'] === 'every_hour' ) {
                $time = HOUR_IN_SECONDS; 
            } 
            elseif ( $opts['cache'] === 'every_half_day' ) {
                $time = 12 * HOUR_IN_SECONDS; 
            } 
            elseif ( $opts['cache'] === 'every_day' ) {
                $time = DAY_IN_SECONDS; 
            } 
            elseif ( $opts['cache'] === 'every_week' ) {
                $time = WEEK_IN_SECONDS; 
            } 
            elseif ( $opts['cache'] === 'every_month' ) {
                $time = MONTH_IN_SECONDS; 
            } 
            elseif ( $opts['cache'] === 'every_year' ) {
                $time = YEAR_IN_SECONDS; 
            } 

            // set cache duration
            $feed->cache_duration = $time;

        }

    }

    /**
     * Feed, RSS not able to clear the cache and cannot change the limit of cache life time
     * 
     * @link https://wordpress.stackexchange.com/questions/190640/feed-rss-not-able-to-clear-the-cache-and-cannot-change-the-limit-of-cache-life
     */
    public function cache_transient( $seconds ) {
        return 1; // one second
    }

    public function cache_disable( &$feed ) {
        $opts = $this->options();
        if ( $feed->feed_url == $opts['feed'] ) {
            $feed->enable_cache(false);
        }
    }

}