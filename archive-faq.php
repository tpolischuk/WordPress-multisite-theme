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
	<h1 class="page-title">Frequently Asked Questions:</h1>
</header><!-- .page-header -->
<section class="faq-section">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php include 'inc/post-article-collapse.php';  ?>	
		<?php endwhile; ?>	
<?php include 'inc/pagination.php'; ?>	
	<?php endif; ?>
</section>

<?php } ?>
<?php genesis(); ?>
<pre class="hide-prod">archive-faq.php</pre>
