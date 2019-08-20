<?php
/*
Template Name: Monthly Archive
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
<header class="page-header monthly-archive-header">
	<?php
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
	?>
</header><!-- .page-header -->
<h2>Archives by Month</h2>
<ul class="monthly-archives">
	<?php wp_get_archives('type=monthly'); ?>
</ul>

<?php } ?>
<?php genesis(); ?>
<pre class="hide-prod">archive.php Template Name: Monthly Archive</pre>
