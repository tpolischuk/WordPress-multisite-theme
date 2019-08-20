<div class="post-info">
	<span class="date published time" title="<?php the_time('F j, Y'); ?>">
		Posted <?php the_time('F j, Y'); ?> by <?php
	if (function_exists('plos_posted_coauthors')) {
		plos_posted_coauthors(); }
	else {
		if (function_exists('plos_posted_on')) {
			plos_posted_on(); }
	}
	?> in <?php the_category(', '); ?></span>
</div><!-- post-info -->
