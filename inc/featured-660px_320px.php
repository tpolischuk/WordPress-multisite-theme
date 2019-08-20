<?php 
if (has_post_thumbnail()) {
	the_post_thumbnail('660px_320px');
} else {
$random = rand(1,12)
?>
	<img src="<?php echo CHILD_URL . '/assets/images/fallbacks/wp-cropped1/' . $random . '660px_320px.jpg'; ?>" alt="Default featured image">
<?php
}
?>
