<?php
/*
Template Name: Archive
*/
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
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'plos_search_loop' );
function plos_search_loop() { ?>
<header class="page-header">
	<?php
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
	?>
</header><!-- .page-header -->
<section>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php include 'inc/post-article-excerpt.php';  ?>
		<?php endwhile; ?>
<?php include 'inc/pagination.php'; ?>
	<?php endif; ?>
</section>

<?php } ?>
<?php genesis(); ?>
<pre class="hide-prod">archive.php Template Name: Archive</pre>
