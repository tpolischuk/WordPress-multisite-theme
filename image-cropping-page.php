<?php
/*
Template Name: Image Cropping Page
*/
?>
<?php
// Add our custom loop
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'post_list_loop' );

function post_list_loop() {
?>

<section>
<?php 

$args = array(
	'showposts' => '-1',
	'tag' =>'crop2'	
);
query_posts( $args );
$the_query = new WP_Query( $args );
?>
<?php if ( $the_query->have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>


    	<section class="img-crop-section clearfix">
    		<h1><?php the_title(); ?></h1>
			<article>
				<?php the_post_thumbnail('690x320'); ?>
				<p><?php the_title(); ?>-690x320px.jpg</p>
			</article>
			<article>
				<?php the_post_thumbnail('660x320'); ?>
				<p><?php the_title(); ?>-660x320px.jpg</p>
			</article>
			<article>
				<?php the_post_thumbnail('600x300'); ?>
				<p><?php the_title(); ?>-600x300px.jpg</p>
			</article>
			<article>
				<?php the_post_thumbnail('550x225'); ?>
				<p><?php the_title(); ?>-550x225px.jpg</p>
			</article>
			<article>
				<?php the_post_thumbnail('463x90'); ?>
				<p><?php the_title(); ?>-463x90px.jpg</p>
			</article>
			<article>
				<?php the_post_thumbnail('330x160'); ?>
				<p><?php the_title(); ?>-330x160px.jpg</p>
			</article>
			<article>
				<?php the_post_thumbnail('300x90'); ?>
				<p><?php the_title(); ?>-300x90px.jpg</p>
			</article>
			<article>
				<?php the_post_thumbnail('215x90'); ?>
				<p><?php the_title(); ?>-215x90px.jpg</p>
			</article>
			<article>
				<?php the_post_thumbnail('100x100'); ?>
				<p><?php the_title(); ?>-100x100px.jpg</p>
			</article>
			<article>
				<?php the_post_thumbnail('70x70'); ?>
				<p><?php the_title(); ?>-70x70px.jpg</p>
			</article>
			<article>
				<?php the_post_thumbnail('60x60'); ?>
				<p><?php the_title(); ?>-60x60px.jpg</p>
			</article>
		</section>
	<?php endwhile; ?>	
<?php endif; ?>
</section>

<?php
}

remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
/** Add the welcome text section */
add_action( 'genesis_sidebar', 'add_blogs_homepage_widget_area' );
function add_blogs_homepage_widget_area() {
		unregister_sidebar( 'sidebar-alt' );
		genesis_widget_area( 'blogs-homepage-widget-area', array(
		'before' => '<aside class="sidebar widget-area blogs-homepage-widget-area">',
		'after' => '</aside>',
		) );
}
genesis(); 
?>	
	
<pre class="hide-prod">post-list.php Template Name: Post List</pre>
