<?php comment_form(); ?>

<?php wp_list_comments(); ?>

<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>

<?php paginate_comments_links(); ?>