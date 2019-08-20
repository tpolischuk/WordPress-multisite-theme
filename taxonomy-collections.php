<?php
/**
 * Genesis Framework.
 *
 * @package Genesis\Templates
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/genesis/
 */

//* This file handles single entries, but only exists for the sake of child theme forward compatibility.
?>
<?php 
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'category_page_loop');
function category_page_loop() {
?>
<section id="primary" class="content-area">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->

		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();

?>
<?php include 'inc/post-article-excerpt.php';  ?>
<?php

		// End the loop.
		endwhile;

		// Previous/next page navigation.
		the_posts_pagination( array(
			'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
			'next_text'          => __( 'Next page', 'twentyfifteen' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
		) );

	// If no content, include the "No posts found" template.
	else :
		get_template_part( 'content', 'none' );

	endif;
	?>

</section><!-- .content-area -->
<?php
}
?>
<?php
genesis();
?>
<pre class="hide-prod">taxonomy-collections.php</pre>
