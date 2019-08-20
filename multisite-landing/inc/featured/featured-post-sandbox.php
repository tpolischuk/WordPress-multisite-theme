<div class="featured-post">
	<?php 

	$args = array(
		'showposts' => '1',
		'tag' =>'featured-sandbox'		
	);
	query_posts( $args );
	$the_query = new WP_Query( $args );
	?>

	<?php if ( $the_query->have_posts() ) : ?>
		<?php $counter = 0; ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php ++$counter; ?>

	  
	        <article id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing category-list-article' ); ?>>
				<h1 class="section-heading">Featured Blog: <?php echo get_post_meta(get_the_ID(), 'source_title', true) ?></h1>				
				<div class="featured-image">
					<a href="<?php echo get_post_meta(get_the_ID(), 'item_link', true) ?>">
						<?php the_post_thumbnail('550px_225px'); ?>
					</a>
				</div>
	            <h2 class="entry-title">
	                <a href="<?php echo get_post_meta(get_the_ID(), 'item_link', true) ?>"><?php the_title(); ?></a>
	            </h2>
	            <span class="edit-post"><?php edit_post_link(__('Edit Post'), ''); ?></span>
				<div class="post-info">
					<span class="date published time" title="<?php the_time('F j, Y'); ?>">Posted <?php the_time('F j, Y'); ?> by <?php the_author_posts_link(); ?></span>
				</div><!-- post-info -->
	        </article>
		<?php endwhile; ?>	
	<?php endif; ?>
	<?php wp_reset_query(); ?>
</div>