<?php 
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>

    <article <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">

        <header class="entry-header">
            <h2 class="entry-title display-3 text-center font-italic mb-3" itemprop="name headline"><?php echo get_the_title(); ?></h2>
        </header><!-- .entry-header -->

        <div class="entry-content" itemprop="articleBody">
            <?php the_content(); ?>
        </div><!-- .entry-content -->

    </article>