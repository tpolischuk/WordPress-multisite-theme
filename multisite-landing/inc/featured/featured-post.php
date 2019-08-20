<div class="featured-post">
	<?php

	$args = array(
		'showposts' => '1',
		'tag' =>'featured'
	);
	query_posts( $args );
	$the_query = new WP_Query( $args );
	?>

	<?php if ( $the_query->have_posts() ) : ?>
		<?php $counter = 0; ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php ++$counter; ?>


	        <article id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing category-list-article' ); ?>>
				<h1 class="section-heading">Featured Blog:
					<a href="<?php
						if (get_post_meta(get_the_ID(), 'item_link', true)) {
							echo get_post_meta(get_the_ID(), 'item_link', true);
						} else {
							echo the_permalink();
						}
					?>">
						<?php
							if (get_post_meta(get_the_ID(), 'item_link', true)) {
								echo get_post_meta(get_the_ID(), 'source_title', true);
							} else {
								echo "PLOS Blogs";
							}
						?>
					</a>
				</h1>
				<div class="featured-image">
					<a href="<?php echo get_post_meta(get_the_ID(), 'item_link', true) ?>">
						<?php include 'featured-image/550x225.php';  ?>
					</a>
				</div>
	            <h2 class="entry-title">
	                <a href="<?php
						if (get_post_meta(get_the_ID(), 'item_link', true)) {
							echo get_post_meta(get_the_ID(), 'item_link', true);
						} else {
							echo the_permalink();
						}
					?>"><?php the_title(); ?></a>
	            </h2>
	            <span class="edit-post"><?php edit_post_link(__('Edit Post'), ''); ?></span>
				<div class="post-info">
					<span class="date published time" title="<?php the_time('F j, Y'); ?>">
						Posted <?php the_time('F j, Y'); ?> by <?php the_author(); ?></a>
					</span>
				</div><!-- post-info -->
	        </article>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_query(); ?>
</div>
