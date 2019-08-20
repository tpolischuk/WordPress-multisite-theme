<?php
/*
Template Name: Featured Post Page
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
    	global $post;
		$args = array(
		    'cat' => $category->term_id,
		    'post_type' => 'post',
		    'posts_per_page' => '3',
		    'exclude' => '1'
		);
		$query = new WP_Query( $args );
		 
		if ( $query->have_posts() && $category->name != 'Uncategorized' ) { 
			
		?>

		<?php if ($counter % 2 == 0 ) : ?>
	    	<section class="<?php echo $category->slug; ?> one-half teaser first">
	    <?php else : ?>
	    	<section class="<?php echo $category->slug; ?> one-half teaser">
	    <?php endif; ?>
			<h1 class="topic-title">
				<a href="<?php echo get_term_link( $category ); ?>">
					<?php echo $category->name; ?>	
				</a>
			</h1>
		<!-- Start new query -->
			<?php
				$feature_counter = 0;
				$args = array( 
					'posts_per_page' => 3,
					 'order'=> 'DSC',
					 'orderby' => 'date',
					 'cat' => $category->term_id,
					 'tag' => 'featured'
					 );
				$postslist = get_posts( $args );
				foreach ( $postslist as $post ) :
				    setup_postdata( $post ); 
			?> 
			<?php 
				if ($feature_counter == 0) {
			?>
					<?php include 'inc/featured-post-article-excerpt.php';  ?>
			<?php	
				}
			?>
				<?php
				$feature_counter++;
				endforeach; 
				wp_reset_postdata();
			?>
		<!-- End new query -->
		<!-- Begin loop for seconday post -->
			<?php
				$feature_counter2 = 0;
				$args = array( 
					'posts_per_page' => 4,
					'order'=> 'DSC',
					'orderby' => 'date',
					'cat' => $category->term_id
					 );
				$postslist = get_posts( $args );
				foreach ( $postslist as $post ) :
				    setup_postdata( $post ); 
			?>
					
			<?php 
				if (has_tag( 'featured' )) {
					if (!$feature_counter2 == 0) {
			?>
				<?php include 'inc/post-article-teaser.php';  ?>
			<?php
					}
			?>
			<?php		
					$feature_counter2++;
				} else {
			?>
				<?php include 'inc/post-article-teaser.php';  ?>
			<?php
				}
			?>
				<?php
				endforeach; 
				wp_reset_postdata();
			?>
		<!-- End loop for seconday post -->
		</section> 
		<?php
		$counter++;
		 } // if ( $query->have_posts() ) 
		wp_reset_postdata();
    } //foreach
}
genesis(); 
?>	
<pre class="hide-prod">featured.php Template Name: Featured Post Page</pre>
