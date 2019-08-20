<?php
/*
Template Name: Archive All
*/
?>
<?php 
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'plos_archive_all_loop' );
function plos_archive_all_loop() { ?>

<header class="page-header">
	<?php
		the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
	?>
</header><!-- .page-header -->
<section>
<?php 
$args = array(
	'showposts' => '10',
	'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
	// showposts=6
);
query_posts( $args );
$the_query = new WP_Query( $args );
?>
	<?php if ( $the_query->have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php include 'inc/post-article-excerpt.php';  ?>	
		<?php endwhile; ?>	
<?php include 'inc/pagination.php'; ?>	
	<?php endif; ?>
</section>

<?php } ?>
<?php genesis(); ?>
<pre class="hide-prod">archive-all.php Template Name: Archive All</pre>
