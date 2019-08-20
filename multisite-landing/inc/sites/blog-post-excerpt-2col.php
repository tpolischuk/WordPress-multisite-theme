<?php
$slug = $blog_rows['blog_slug'];
$id = get_id_from_blogname($slug);
switch_to_blog($id);
$blog_details = get_blog_details($id);
?>
<?php

$args = array(
		'showposts' => '1'
	);
	query_posts( $args );
	$the_query = new WP_Query( $args );
?>

<?php if ( $the_query->have_posts() ) : ?>
	<?php $counter = 0; ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php ++$counter; ?>
		<article class="category-listing landing-excerpt">
			<h1 class="entry-title blog-name wpp-post-title">
				<a href="<?php echo $blog_details->path; ?>">
					<?php echo $blog_details->blogname; ?>
				</a>
			</h1>
			<div class="landing-excerpt-image align-left">
				<a href="<?php the_permalink(); ?>">
					<?php include 'featured-image/463x90.php'; ?>
				</a>
			</div>
		    <span class="edit-post"><?php edit_post_link(__('Edit Post'), ''); ?></span>
			<h2 class="entry-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
			</h2>
			<div class="post-info"> Posted <?php the_time('F j, Y'); ?> by <?php the_author_posts_link(); ?></div><!-- post-info -->
		</article>
	<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>
<?php
restore_current_blog();

?>
