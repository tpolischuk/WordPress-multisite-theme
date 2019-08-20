<?php
/*
Template Name: Home (Post List)
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
	'showposts' => '8'	
);
query_posts( $args );
$the_query = new WP_Query( $args );
?>
<?php if ( $the_query->have_posts() ) : ?>
	<?php $counter = 1; ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php ++$counter; ?>
	<?php if ($counter % 2 == 0 ) : ?>
    	<section class="<?php echo $category->slug; ?>post-list featured-list-section one-half teaser first">
    <?php else : ?>
    	<section class="<?php echo $category->slug; ?>post-list featured-list-section one-half teaser">
    <?php endif; ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing category-list-article' ); ?>>
			<div class="topics-featured-image height-cropped">
				<a href="<?php the_permalink(); ?>">
					<?php include 'inc/featured-image/330x160.php'; ?>
				</a>
			</div>

            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?> 
                </a>
            </h2>
            <span class="edit-post"><?php edit_post_link(__('Edit Post'), ''); ?></span>

           <?php include 'inc/post-info.php';  ?>
			
        </article>
    </section>
	<?php endwhile; ?>	
<?php endif; ?>
</section>

<?php
}

// remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
// /** Add the welcome text section */
// add_action( 'genesis_sidebar', 'add_blogs_homepage_widget_area' );
// function add_blogs_homepage_widget_area() {
// 		unregister_sidebar( 'sidebar-alt' );
// 		genesis_widget_area( 'blogs-homepage-widget-area', array(
// 		'before' => '<aside class="sidebar widget-area blogs-homepage-widget-area">',
// 		'after' => '</aside>',
// 		) );
// }
genesis(); 
?>	
	
<pre class="hide-prod">home.php Template Name: Home (Post List)</pre>
