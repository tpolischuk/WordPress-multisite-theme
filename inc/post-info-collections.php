<div class="post-info">
	<span class="date published time" title="<?php the_time('F j, Y'); ?>">Posted <?php the_time('F j, Y'); ?> by <?php the_author_posts_link(); ?><?php global $post; if( count(wp_get_object_terms( $post->ID, 'collections')) > 0 ) echo  ' in ' . get_the_term_list( $post->ID, 'collections', '', ', ', '' ); ?></span>
</div><!-- post-info -->