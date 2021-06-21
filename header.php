<?php 
$html_class  = 'navbar-fixed';
$html_class .= ( is_home() || is_front_page() ) ? ' homepage' : ' subpage';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo $html_class; ?>">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no" />
    <!-- Do not change the meta tag above. -->
    <!-- X-UA-Compatible does not work in Explorer if http-equiv is not directly below it. -->

    <title><?php wp_title(); ?></title>
    
    <?php 
    if ( ! starter_is_plugin_active( 'wp-seo' ) ) : ?>
        <meta name="description" content="<?php bloginfo('description'); ?>">

        <!-- Canonical URL -->
        <link rel="canonical" href="<?php echo get_home_url() . $_SERVER['REQUEST_URI']; ?>">
        <?php
    endif;
    ?>

    <!-- News Feeds -->
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

    <!--[if lt IE 9]>
    <noscript>
        <div class="alert alert-danger message-noscript-warning" role="alert">
            <strong>This web page requires JavaScript to be enabled.</strong><br/>
            JavaScript is an object-oriented computer programming language
            commonly used to create interactive effects within web browsers.
        </div>
    </noscript>
    <div class="alert alert-warning message-browser-upgrade" role="alert">
        You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.
    </div>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<?php starter_set_post_view(); ?>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<div id="page" class="site">
        
    <a id="skip-navigation" class="sr-only sr-only-focusable" href="#content">Skip to content</a>

    <header id="masthead" class="site-header" itemscope itemtype="http://schema.org/WPHeader">

        <h1 class="site-title sr-only" itemprop="name"><?php bloginfo('name'); ?></h1>

        <nav id="primary-navigation" class="site-navigation navbar navbar-expand-lg navbar-light fixed-top bg-light rounded" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <div class="container">
                <h2 class="sr-only">Navigation</h2>
                <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <?php
                    wp_nav_menu( array(
                        'menu'            => '',
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'navbar-nav mr-auto',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'item_spacing'    => 'preserve',
                        'depth'           => 0,
                        'walker'          => new Starter_Bootstrap4_Walker_Menu,
                        'theme_location'  => 'menu-1',
                    ) );
                    ?>
                    <?php 
                    if ( starter_is_search_has_results() !== false ) {
                        get_search_form(); 
                    }
                    ?>
                </div>
            </div><!-- .container -->
        </nav><!-- .site-navigation -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">