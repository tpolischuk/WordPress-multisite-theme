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
add_action('genesis_loop', 'single_page_loop');
function single_page_loop() {
?>

<section id="primary" class="content-area">
	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();
	?>
	<?php
	global $blog_id;

	if ($blog_id == 84) { // collections blog is 81 on local
	?>
		<header class="page-header">
			<h2 class="page-title">
				<?php 
					$categories = get_the_category(); 
					foreach($categories as $category) { 
						$cat_name = $category->name; 
						if($cat_name != 'featured') 
							echo '<a href="'.get_category_link($category->term_id).'">'.$cat_name . '</a> ';
					} 
				?>
			</h2>
		</header><!-- .page-header -->
	<?php
	} else {
		// do absolutely nothing.
	}
	?>


<?php include 'inc/post-navigation.php';  ?>	

<article id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing' ); ?>>

	<?php include 'inc/featured-image/690x320.php';  ?>
    <h1 class="entry-title">
        <?php the_title(); ?> 
    </h1>
    <span class="edit-post"><?php edit_post_link(__('Edit Post'), ''); ?></span>
	
	<?php include 'inc/post-info.php';  ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>

<?php include 'inc/post-navigation.php';  ?>
<?php include 'inc/author.php';  ?>
	
<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
	comments_template();
endif;
	// End the loop.
	endwhile;

	?>

</section><!-- .primary -->

<?php
}
?>
<?php
genesis();
?>
<pre class="hide-prod">single.php</pre>