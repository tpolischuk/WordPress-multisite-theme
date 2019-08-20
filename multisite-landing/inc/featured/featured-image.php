<?php 

	$thumb = get_the_post_thumbnail();

	if ($thumb) {
	// add_filter( 'sitewide_tags_thumb_size', '550px_225px' );
	
	the_post_thumbnail();

	} elseif ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
		the_post_thumbnail('Featured Image');
	} elseif (! empty( $displaysetting['term_image'] )) { // Check it Display Featured Image for Genesis is activated
		
		if ( ! empty( $displaysetting['term_image'] ) ) {
			$term_image = $displaysetting['term_image'];
			if ( ! is_numeric( $displaysetting['term_image'] ) ) {
				$term_image = Display_Featured_Image_Genesis_Common::get_image_id( $displaysetting['term_image'] );
			}
			$image_url = wp_get_attachment_image_src( $term_image, 'Featured Image' );

			echo '<img width="690" height="290" src="' . $image_url[0] . '" class="attachment-Featured Image wp-post-image" />';
		}								
	} elseif (!empty($default_featured_image)) {
		echo '<img width="690" height="290" src="' . $default_featured_image['url'] . '" alt="'. $default_featured_image['alt'] .'" class="attachment-Featured Image wp-post-image" />';
	} else { ?>
		<img src="<?php echo CHILD_URL . '/assets/images/default-cat/static-default-featured-image.png'; ?>">
	<?php }
?>