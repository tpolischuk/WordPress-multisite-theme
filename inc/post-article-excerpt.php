<article id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing list-view' ); ?>>
	
	<div class="medium-image align-left">
		<?php include 'featured-image/100x100.php'; ?>
	</div>
   
    <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?> 
        </a>
    </h2>
    <span class="edit-post"><?php edit_post_link(__('Edit Post'), ''); ?></span>

	<?php include 'post-info.php';  ?>
	
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>
</article>	