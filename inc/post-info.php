<?php
	global $blog_id;

	if ($blog_id == 84) { // collections blog is 81 on local
	include 'post-info-collections.php';
	?>

	<?php
	} else {
		include 'post-info-post.php';
	}
?>
