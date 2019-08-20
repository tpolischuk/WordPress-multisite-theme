<article id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing' ); ?>>
	<div class="topics-featured-image">
		<?php include 'featured-image/660x320.php';  ?>
	</div>

    <h3 class="entry-title">
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?> 
        </a>
    </h3>
    <span class="edit-post"><?php edit_post_link(__('Edit Post'), ''); ?></span>

	<div class="post-info">
		<span class="date published time" title="<?php the_time('F j, Y'); ?>">
			Posted <?php the_time('F jS, Y'); ?> in
			<?php
				global $post;
			    $collections_terms = get_the_terms( $post->ID, 'collections' );
			    $col_counter = 0;
			    if ($collections_terms) {
			    	$collections_total = count($collections_terms);
			    	// $counter = 0;
		            foreach ($collections_terms as $collections_term) {
		            	//echo $collections_total;
		                echo '<a href="' . get_option('siteurl') . '/collections/' . $collections_term->slug . '" title="' . sprintf( __( "Learn more about the %s" ), $collections_term->name ) . '"' . '>';
		                echo $collections_term->name;
							if (++$col_counter < $collections_total ) {
								echo ",&nbsp;";
							}  
		                echo '</a>';
		            }
			    }
			?>
			by <?php the_author_posts_link(); ?>
		</span>
		<?php // the_tags( '<br/>Tagged with: ', ' • ' ); ?>
		<?php // echo '<br/>feature post count:' . $feature_counter; ?>
	</div><!-- post-info -->
</article>	