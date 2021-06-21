<?php
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<section id="comments" class="post-comments">
    
    <h2>Comment</h2>
    
    <?php
    //Get only the approved comments 
    $args = array(
        'status' => 'approve'
    );
     
    // The comment Query
    $comments_query = new WP_Comment_Query;
    $comments = $comments_query->query( $args );
     
    // Comment Loop
    if ( $comments ) {
        foreach ( $comments as $comment ) {
            echo '<p>' . $comment->comment_content . '</p>';
        }
    } else {
        echo _e( 'No comments found.', 'starter-text-domain' );
    }
    ?>
     
</section><!-- .post-coments -->