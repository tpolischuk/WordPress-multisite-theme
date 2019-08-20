<?php 
$size = basename(__FILE__, '.php'); 
if (has_post_thumbnail()) {
	the_post_thumbnail($size);
} else {
$random = rand(1,12)
?>
	<img src="<?php echo CHILD_URL . '/assets/images/fallbacks/wp-cropped1/' . $random . '-' . $size . '.jpg'; ?>" alt="Default featured image">
	
<?php
}
?>
