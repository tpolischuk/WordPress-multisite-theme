<?php
/*
Template Name: Category List
*/
?>
<?php
// Add our custom loop
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'one_post_per_tax_loop' );

function one_post_per_tax_loop() {
	$categories = get_categories(); 
 	$counter = 0;
    foreach ( $categories as $category ) {
    	$do_not_duplicate[] = get_the_ID();
		$args = array(
			'category__not_in' => array(1),
		    'cat' => $category->term_id,
		    'post__not_in'=> $do_not_duplicate,
		    'post_type' => 'post',
		    'posts_per_page' => '1'
		);
		$query = new WP_Query( $args );
		 
		if ( $query->have_posts() ) { 
			$post_object_archive = get_field('archive_selected_post', 'option');

		?>
			<?php if ($counter % 2 == 0 ) : ?>
		    	<section class="<?php echo $category->slug; ?> category-list featured-list-section one-half teaser first">
		    <?php else : ?>
		    	<section class="<?php echo $category->slug; ?> category-list featured-list-section one-half teaser">
		    <?php endif; ?>
	
		        <h1 class="topic-title">
		        	<a href="<?php echo get_term_link( $category ); ?>">
		        		<?php echo $category->name; ?>	
		        	</a>
		        </h1>
		        <?php while ( $query->have_posts() ) {
		 
		            $query->the_post();
		            $do_not_duplicate[] = get_the_ID();
		            $category_image_src = get_field('category_image_src');
		            $default_featured_image = get_field('default_featured_image', 'option');
		            $displaysetting = get_option( "displayfeaturedimagegenesis_$category->term_id" );
		        ?>
		 
		            <article id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing category-list-article' ); ?>>

						<div class="topics-featured-image height-cropped">
							<a href="<?php the_permalink(); ?>">
								<?php include 'inc/featured-image/660x320.php';  ?>
							</a>
						</div>

		                <h2 class="entry-title">
		                    <a href="<?php the_permalink(); ?>">
		                        <?php the_title(); ?> 
		                    </a>
		                </h2>
		                <span class="edit-post"><?php edit_post_link(__('Edit Post'), ''); ?></span>

						<?php include 'inc/post-info.php';  ?>

						
		            </article>
		 
		        <?php
		       	
		        }; // end while ?>
		        <div class="entry-footer">
			        <a class="meta" href="<?php echo get_term_link( $category ); ?>">
			        	More posts in <?php echo $category->name; ?> <i class="fa fa-caret-right"></i>
			        </a>
			    </div>
		    </section>
		 
		<?php
		
		 } elseif ($post_object_archive) { 
		 	$post = $post_object_archive;
			setup_postdata( $post ); 
		 ?>
			<?php if ($counter % 2 == 0 ) : ?>
		    	<section class="<?php echo $category->slug; ?> category-list featured-list-section one-half teaser first">
		    <?php else : ?>
		    	<section class="<?php echo $category->slug; ?> category-list featured-list-section one-half teaser">
		    <?php endif; ?>
				    <h2 class="topic-title">
				    	<a href="<?php the_field('from_the_archive_url', 'option'); ?>">
				    		<?php the_field('from_the_archive_text', 'option'); ?>
				    	</a>
				    </h2>
				    <article id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing category-list-article' ); ?>>

						<div class="topics-featured-image height-cropped">
							<?php include 'inc/featured-image/660x320.php';  ?>
						</div>

				        <h3 class="entry-title">
				            <a href="<?php the_permalink(); ?>">
				                <?php the_title(); ?> 
				            </a>
				        </h3>
				        <span class="edit-post"><?php edit_post_link(__('Edit Post'), ''); ?></span>

						<?php include 'include/post-info.php';  ?>
						
				    </article>
				    <div class="entry-footer">
				        <a class="meta" href="<?php the_field('from_the_archive_url', 'option'); ?>">
				        	More posts in Archives <i class="fa fa-caret-right"></i>
				        </a>
				    </div>
				</section>
		 <?php
		 }
		 $counter++;
		// Use reset to restore original query.
		wp_reset_postdata();
    } ?>
<?php
}

genesis(); 
?>	
	
<pre class="hide-prod">category-list.php Template Name: Category List</pre>
