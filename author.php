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
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'plos_search_loop' );
function plos_search_loop() { ?>
<header class="page-header">
	<h1 class="page-title">Posts by Author</h1>
</header><!-- .page-header -->
<?php include 'inc/author.php';  ?>
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
<pre class="hide-prod">archive.php</pre>
