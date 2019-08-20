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
	
<?php include 'inc/post-navigation.php';  ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-faq' ); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
	<div class="topics-featured-image full-width">
		<?php the_post_thumbnail('Featured Image'); ?>
	</div>
	<?php } ?>
    <h1 class="entry-title">
        <?php the_title(); ?> 
    </h1>
    <span class="edit-post"><?php edit_post_link(__('Edit FAQ'), ''); ?></span>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>

<?php include 'inc/post-navigation.php';  ?>

	
<?php
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